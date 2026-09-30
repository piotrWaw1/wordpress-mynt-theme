document.addEventListener("DOMContentLoaded", () => {
  const filters = document.getElementById("filters");
  const grid = document.getElementById("blogGrid");
  const loadMoreBtn = document.getElementById("loadMoreBtn");

  let page = 1;
  let activeFilter = "all";

  if (!filters || !grid || !innerGrid) return;

  let controller = null; // lets us cancel a request if the user clicks quickly

  filters.addEventListener("click", async (e) => {
    const btn = e.target.closest(".chip");
    if (!btn) return;

    page = 1;
    activeFilter = btn.dataset.filter;

    // 1. Update active state
    filters.querySelectorAll(".chip").forEach((chip) => {
      chip.classList.remove("active");
      chip.setAttribute("aria-pressed", "false");
    });
    btn.classList.add("active");
    btn.setAttribute("aria-pressed", "true");

    // 2. Build the request
    const data = new FormData();
    data.append("action", "filter_posts");
    data.append("nonce", blogFilter.nonce);
    if (btn.dataset.filter !== "all") {
      data.append("category", btn.dataset.filter);
    }
    data.append("featured_id", filters.dataset.featuredId);
    data.append("paged", 1);

    // 3. Cancel the previous request, show loading state
    if (controller) controller.abort();
    controller = new AbortController();
    grid.classList.add("is-loading");

    try {
      const response = await fetch(blogFilter.ajaxUrl, {
        method: "POST",
        body: data,
        signal: controller.signal,
      });
      const result = await response.json();
      if (result.success) {
        grid.innerHTML = `
          ${result.data.feature_post_html}
          <div class="blog-grid" id="innerGrid">${result.data.posts_html}</div>
        `;
        if (page >= result.data.max_pages) {
          loadMoreBtn.classList.add("hidden");
        } else {
          loadMoreBtn.classList.remove("hidden");
        }
      }
    } catch (err) {
      if (err.name !== "AbortError") {
        grid.innerHTML =
          '<p class="no-posts">Coś poszło nietak. Spróbuj ponownie później.</p>';
      }
    } finally {
      grid.classList.remove("is-loading");
    }
  });

  if (!loadMoreBtn) return;
  loadMoreBtn.addEventListener("click", async (e) => {
    const innerGrid = document.getElementById("innerGrid");
    if (!innerGrid) return;

    page += 1;

    const data = new FormData();
    data.append("action", "filter_posts");
    data.append("nonce", blogFilter.nonce);
    if (activeFilter !== "all") {
      data.append("category", activeFilter);
    }
    data.append("featured_id", filters.dataset.featuredId);
    data.append("paged", page);

    if (controller) controller.abort();
    controller = new AbortController();
    grid.classList.add("is-loading");

    try {
      const response = await fetch(blogFilter.ajaxUrl, {
        method: "POST",
        body: data,
        signal: controller.signal,
      });
      const result = await response.json();
      if (result.success) {
        innerGrid.insertAdjacentHTML("beforeend", result.data.posts_html);
        if (page >= result.data.max_pages) {
          loadMoreBtn.classList.add("hidden");
        }
      }
    } catch (err) {
      if (err.name !== "AbortError") {
        innerGrid.insertAdjacentHTML(
          "beforeend",
          '<p class="no-posts">Coś poszło nietak. Spróbuj ponownie później.</p>',
        );
      }
    } finally {
      grid.classList.remove("is-loading");
    }
  });
});
