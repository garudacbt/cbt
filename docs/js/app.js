/**
 * ============================================================
 * APP: Logika utama aplikasi panduan
 * ============================================================
 * Aplikasi panduan interaktif dengan sidebar navigasi, pencarian,
 * dan manajemen halaman dinamis.
 */

// ============================================================
// CONSTANTS
// ============================================================
const SELECTORS = {
    sidebar: '#sidebar',
    sidebarNav: '#sidebarNav',
    sidebarOverlay: '#sidebarOverlay',
    mainWrapper: '#mainWrapper',
    contentArea: '#contentArea',
    bcSection: '#bcSection',
    bcCurrent: '#bcCurrent',
    subBcCurrent: '#sub-bcCurrent',
    btnToggleSidebar: '#btnToggleSidebar',
    topbarSearch: '#topbarSearch',
    searchInput: '#searchInput',
    searchResults: '#searchResults',
    scrollTopBtn: '#scrollTopBtn',
    toastContainer: '#toastContainer',
    btnThemeToggle: '#btnThemeToggle',
};

const CLASSES = {
    navItem: '.nav-item',
    navLink: '.nav-link',
    navSubmenu: '.nav-submenu',
    navSectionLabel: '.nav-section-label',
    pageNavBtn: '.page-nav-btn',
    searchResultItem: '.search-result-item',
};

const BREAKPOINTS = {
    mobile: 992,
};

const TIMEOUTS = {
    toastDuration: 3000,
    toastFadeOutDuration: 300,
    welcomeDelay: 800,
    scrollThreshold: 400,
};

const SEARCH = {
    minQueryLength: 2,
    maxResults: 8,
};

// ============================================================
// STATE
// ============================================================
let currentPage = 'tentang-aplikasi';
let expandedMenus = new Set();
let currentTheme = 'light';
let isRestoringState = false;

/**
 * Save navigation state to localStorage
 */
function saveNavigationState() {
    try {
        localStorage.setItem('currentPage', currentPage);
        localStorage.setItem('expandedMenus', JSON.stringify([...expandedMenus]));
    } catch (e) {
        console.warn('Failed to save navigation state:', e);
    }
}

/**
 * Load navigation state from localStorage
 */
function loadNavigationState() {
    try {
        const savedPage = localStorage.getItem('currentPage');
        const savedMenus = localStorage.getItem('expandedMenus');
        
        if (savedPage && pageContents[savedPage]) {
            currentPage = savedPage;
        }
        
        if (savedMenus) {
            expandedMenus = new Set(JSON.parse(savedMenus));
        }
    } catch (e) {
        console.warn('Failed to load navigation state:', e);
    }
}

/**
 * Save sidebar scroll position and active submenu
 */
function saveSidebarScrollPosition() {
    try {
        const sidebar = getElement(SELECTORS.sidebarNav);
        if (sidebar) {
            localStorage.setItem('sidebarScrollPosition', sidebar.scrollTop);

            // Save the active submenu item
            const activeLink = getElement(`${CLASSES.navLink}.active`);
            if (activeLink) {
                localStorage.setItem('activeSubmenuId', activeLink.getAttribute('data-page-id'));
            }
        } else {
            console.warn('Sidebar element not found.');
        }
    } catch (e) {
        console.warn('Failed to save sidebar scroll position:', e);
    }
}

/**
 * Restore sidebar scroll position and center active submenu
 */
function restoreSidebarScrollPosition() {
    try {
        const sidebar = getElement(SELECTORS.sidebarNav);
        if (!sidebar) return;

        const activeSubmenuId = localStorage.getItem('activeSubmenuId');
        if (activeSubmenuId) {
            const activeLink = getElement(`${CLASSES.navLink}[data-page-id="${activeSubmenuId}"]`);
            if (activeLink) {
                // ① Matikan transition submenu agar layout langsung final
                const submenus = getElements(`${CLASSES.navSubmenu}`);
                const navArrows = getElements('.nav-arrow');

                submenus.forEach(sm => sm.style.transition = 'none');
                navArrows.forEach(a => a.style.transition = 'none');

                // ② Force reflow → browser apply style tanpa transisi
                void sidebar.offsetHeight;

                // ③ Hitung offset untuk center-kan active link
                const sidebarRect = sidebar.getBoundingClientRect();
                const linkRect = activeLink.getBoundingClientRect();
                const offset = linkRect.top
                    - sidebarRect.top
                    - sidebarRect.height / 2
                    + linkRect.height / 2;
                sidebar.scrollTop += offset;

                // ④ Kembalikan transition
                void sidebar.offsetHeight;
                submenus.forEach(sm => sm.style.transition = '');
                navArrows.forEach(a => a.style.transition = '');

                return;
            }
        }

        // Fallback ke posisi scroll tersimpan
        const savedScrollPosition = localStorage.getItem('sidebarScrollPosition');
        if (savedScrollPosition) {
            sidebar.scrollTop = parseInt(savedScrollPosition, 10);
        }
    } catch (e) {
        console.warn('Failed to restore sidebar scroll position:', e);
    }
}

// ============================================================
// THEME MANAGER
// ============================================================

/**
 * Get theme preference from localStorage
 * @returns {string|null} - Theme preference or null
 */
function getThemePreference() {
    try {
        return localStorage.getItem('theme');
    } catch (e) {
        console.warn('localStorage not available:', e);
        return null;
    }
}

/**
 * Save theme preference to localStorage
 * @param {string} theme - Theme to save ('light' or 'dark')
 */
function saveThemePreference(theme) {
    try {
        localStorage.setItem('theme', theme);
    } catch (e) {
        console.warn('Failed to save theme preference:', e);
    }
}

/**
 * Get system theme preference
 * @returns {boolean} - True if system prefers dark mode
 */
function getSystemThemePreference() {
    return window.matchMedia('(prefers-color-scheme: dark)').matches;
}

/**
 * Apply theme to the document
 * @param {string} theme - Theme to apply ('light' or 'dark')
 */
function applyTheme(theme) {
    if (theme !== 'light' && theme !== 'dark') return;
    
    document.documentElement.setAttribute('data-theme', theme);
    document.body.setAttribute('data-theme', theme);
    currentTheme = theme;
    
    // Update toggle button icon
    const toggleBtn = getElement(SELECTORS.btnThemeToggle);
    if (toggleBtn) {
        const icon = toggleBtn.querySelector('i');
        if (icon) {
            icon.className = theme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
        }
    }
}

/**
 * Toggle between light and dark theme
 */
function toggleTheme() {
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    applyTheme(newTheme);
    saveThemePreference(newTheme);
}

/**
 * Initialize theme based on preference or system setting
 */
function initTheme() {
    const savedPreference = getThemePreference();
    
    if (savedPreference === 'light' || savedPreference === 'dark') {
        applyTheme(savedPreference);
    } else {
        const systemPrefersDark = getSystemThemePreference();
        applyTheme(systemPrefersDark ? 'dark' : 'light');
    }
}

/**
 * Setup theme toggle functionality
 */
function setupThemeToggle() {
    const toggleBtn = getElement(SELECTORS.btnThemeToggle);
    if (toggleBtn) {
        toggleBtn.addEventListener('click', toggleTheme);
    }
    
    // Listen for system theme changes (only if no manual preference)
    const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
    mediaQuery.addEventListener('change', (e) => {
        if (!getThemePreference()) {
            applyTheme(e.matches ? 'dark' : 'light');
        }
    });
}

// ============================================================
// UTILITY FUNCTIONS
// ============================================================

/**
 * Aman mengambil elemen dari DOM
 * @param {string} selector - CSS selector
 * @returns {Element|null} - Element atau null jika tidak ditemukan
 */
function getElement(selector) {
    const el = document.querySelector(selector);
    if (!el) console.warn(`Element tidak ditemukan: ${selector}`);
    return el;
}

/**
 * Aman mengambil list elemen dari DOM
 * @param {string} selector - CSS selector
 * @returns {NodeListOf<Element>} - List elemen
 */
function getElements(selector) {
    return document.querySelectorAll(selector);
}

/**
 * Cek apakah browser sedang di mobile
 * @returns {boolean}
 */
function isMobile() {
    return window.innerWidth < BREAKPOINTS.mobile;
}

/**
 * Scroll element ke view dengan smooth behavior
 * @param {Element} element - Element untuk di-scroll
 */
function scrollIntoViewSmooth(element) {
    if (element) {
        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

/**
 * Toggle class pada element
 * @param {Element} element - Element
 * @param {string} className - Nama class
 * @param {boolean} force - Force add (true) atau remove (false)
 */
function toggleClass(element, className, force) {
    if (!element) return;
    if (force !== undefined) {
        element.classList.toggle(className, force);
    } else {
        element.classList.toggle(className);
    }
}

// ============================================================
// NAVIGATION FUNCTIONS
// ============================================================

/**
 * Cari parent menu ID dari target page ID
 * @param {string} targetId - Page ID
 * @returns {string|null} - Parent menu ID atau null
 */
function findParentMenuId(targetId) {
    const matches = [];

    menuData.forEach(section => {
        section.items.forEach(item => {
            if (item.children && item.children.some(c => c.id === targetId)) {
                matches.push(item.id);
            }
        });
    });

    if (matches.length === 0) return null;

    // Prefer a parent that is already expanded (user context), if any
    for (const m of matches) {
        if (expandedMenus.has(m)) return m;
    }

    // Otherwise return the first match (top-down)
    return matches[0];
}

/**
 * Ambil informasi prev/next dari target page ID
 * @param {string} targetId - Page ID
 * @returns {Object|null} - {prev, next} atau null
 */
function getPrevNext(targetId) {
// 1. Ratakan data (flatten) semua children menjadi satu array tunggal agar mudah dicari
    const allChildren = menuData
        .flatMap(sec => sec.items)
        .flatMap(item => item.children);

    // 2. Cari item aktif berdasarkan targetId
    const currentItem = allChildren.find(child => child.id === targetId);

    // Jika item tidak ditemukan, kembalikan null
    if (!currentItem) return null;

    // 3. Cari detail data untuk prev dan next berdasarkan ID yang tertera di currentItem
    const prevItem = allChildren.find(child => child.id === currentItem.prev);
    const nextItem = allChildren.find(child => child.id === currentItem.next);

    // 4. Susun format output sesuai keinginan
    return {
        prev: prevItem ? { id: prevItem.id, label: prevItem.label } : null,
        next: nextItem ? { id: nextItem.id, label: nextItem.label } : null
    };
}

// ============================================================
// SIDEBAR FUNCTIONS
// ============================================================

/**
 * Render HTML sidebar dari menuData
 */
function renderSidebar() {
    const nav = getElement(SELECTORS.sidebarNav);
    if (!nav) return;

    let html = '';

    menuData.forEach(section => {
        html += `<div class="nav-section-label">${section.section}</div>`;
        section.items.forEach(item => {
            const hasChildren = item.children && item.children.length > 0;
            const isExpanded = expandedMenus.has(item.id);

            html += `<div class="nav-item">`;
            html += `<div class="nav-link${isExpanded ? ' expanded' : ''}${!hasChildren && item.id === currentPage ? ' active' : ''}"
                    data-menu-id="${item.id}"
                    ${hasChildren ? 'data-has-children="true"' : `data-page-id="${item.id}"`}>
                    <i class="nav-icon ${item.icon}"></i>
                    <span class="nav-text">${item.label}</span>
                    ${hasChildren ? '<i class="nav-arrow fas fa-chevron-right"></i>' : ''}
                  </div>`;

            if (hasChildren) {
                html += `<div class="nav-submenu${isExpanded ? ' open' : ''}"><div>`;
                item.children.forEach(child => {
                    html += `<div class="nav-link${child.id === currentPage ? ' active' : ''}" data-page-id="${child.id}">
                        <span class="nav-text">${child.label}</span>
                      </div>`;
                });
                html += `</div></div>`;
            }
            html += `</div>`;
        });
    });

    nav.innerHTML = html;
    bindSidebarEvents();
}

/**
 * Bind event listeners ke sidebar elements
 */
function bindSidebarEvents() {
    // Menu dengan children: toggle submenu
    getElements(`${CLASSES.navLink}[data-has-children]`).forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const menuId = link.getAttribute('data-menu-id');
            const navItem = link.closest(CLASSES.navItem);
            const submenu = navItem?.querySelector(CLASSES.navSubmenu);

            if (expandedMenus.has(menuId)) {
                expandedMenus.delete(menuId);
                toggleClass(link, 'expanded', false);
                toggleClass(submenu, 'open', false);
            } else {
                expandedMenus.add(menuId);
                toggleClass(link, 'expanded', true);
                toggleClass(submenu, 'open', true);
            }
        });
    });

    // Menu tanpa children atau submenu item: navigasi
    getElements(`${CLASSES.navLink}[data-page-id]`).forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const pageId = link.getAttribute('data-page-id');
            // Determine parent menu id from DOM to avoid ambiguity when
            // multiple entries share the same page id in menuData.
            const parentNavLink = link.closest(CLASSES.navItem)?.querySelector(`${CLASSES.navLink}[data-menu-id]`);
            const parentMenuId = parentNavLink ? parentNavLink.getAttribute('data-menu-id') : null;
            navigateTo(pageId, parentMenuId);
        });
    });
}

/**
 * Update menu state saat navigasi ke halaman baru
 * @param {string|null} parentMenuId - Parent menu ID yang akan di-expand
 */
function updateMenuState(parentMenuId) {
    // Collapse semua menu kecuali parent menu
    expandedMenus.forEach(menuId => {
        if (menuId !== parentMenuId) {
            expandedMenus.delete(menuId);
            const navLink = getElement(`.nav-link[data-menu-id="${menuId}"]`);
            const submenu = navLink?.closest(CLASSES.navItem)?.querySelector(CLASSES.navSubmenu);
            
            toggleClass(navLink, 'expanded', false);
            toggleClass(submenu, 'open', false);
        }
    });

    // Auto-expand parent menu jika belum
    if (parentMenuId && !expandedMenus.has(parentMenuId)) {
        expandedMenus.add(parentMenuId);
        const navLink = getElement(`.nav-link[data-menu-id="${parentMenuId}"]`);
        const submenu = navLink?.closest(CLASSES.navItem)?.querySelector(CLASSES.navSubmenu);
        
        toggleClass(navLink, 'expanded', true);
        toggleClass(submenu, 'open', true);
    }

    // Update active states
    getElements(CLASSES.navLink).forEach(link => {
        link.classList.remove('active');
    });
    
    const pageId = currentPage;
    const activeLink = getElement(`${CLASSES.navLink}[data-page-id="${pageId}"]`);
    toggleClass(activeLink, 'active', true);
}

/**
 * Navigasi ke halaman spesifik
 * @param {string} pageId - ID halaman untuk ditampilkan
 * @param parentMenuIdArg
 * @param {boolean} skipScroll - Skip scroll to top (for restore)
 */
function navigateTo(pageId, parentMenuIdArg = null, skipScroll = false) {
    currentPage = pageId;

    const parentMenuId = parentMenuIdArg || findParentMenuId(pageId);
    updateMenuState(parentMenuId);

    // Render konten
    renderContent(pageId);
    updateBreadcrumb(pageId);

    // Save navigation state
    saveNavigationState();

    // Tutup sidebar di mobile
    if (isMobile()) {
        closeSidebar();
    }

    // Scroll ke atas (skip if restoring state)
    if (!skipScroll) {
        scrollIntoViewSmooth(getElement(SELECTORS.contentArea));
    }
}

// ============================================================
// CONTENT FUNCTIONS
// ============================================================

/**
 * Build HTML untuk navigation buttons (prev/next)
 * @param {string} pageId - Current page ID
 * @returns {string} - HTML untuk navigation buttons
 */
function buildPageNavigationHtml(pageId) {
    const navigator = getPrevNext(pageId);
    if (!navigator) return '<div class="page-nav mb-4"></div>';

    let navHtml = '<div class="page-nav mb-4">';

    if (navigator.prev) {
        navHtml += `<div class="page-nav-btn prev" data-page-id="${navigator.prev.id}">
                        <i class="fas fa-arrow-left"></i>
                        <div><span class="pn-label">Sebelumnya</span>${navigator.prev.label}</div>
                      </div>`;
    }

    if (navigator.next) {
        navHtml += `<div class="page-nav-btn next" data-page-id="${navigator.next.id}">
                        <div><span class="pn-label">Selanjutnya</span>${navigator.next.label}</div>
                        <i class="fas fa-arrow-right"></i>
                      </div>`;
    }

    navHtml += '</div>';
    return navHtml;
}

/**
 * Render konten halaman ke content area
 * @param {string} pageId - Page ID
 */
function renderContent(pageId) {
    const area = getElement(SELECTORS.contentArea);
    if (!area) return;

    const temPage = {
        title: `${pageId}`,
        desc: 'Halaman belum tersedia atau sedang dalam proses.',
        html: `
        <div class="content-card">
            <p>Konten untuk halaman ini belum tersedia.</p>
        </div>`
    }
    const page = pageContents[pageId] || temPage;
    const navHtml = buildPageNavigationHtml(pageId);
    area.innerHTML = `
        <div class="page-header">
          <h1>${page.title}</h1>
          <p class="page-desc">${page.desc}</p>
        </div>
        ${page.html}
        ${navHtml}
      `;

    // Bind event untuk navigation buttons
    area.querySelectorAll(`${CLASSES.pageNavBtn}[data-page-id]`).forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            navigateTo(btn.getAttribute('data-page-id'));
        });
    });
}

function getSectionAndParent(childId) {
    let hasil = null;
    for (const sec of menuData) {
        for (const parent of sec.items) {
            const targetChild = parent.children.find(child => child.id === childId);
            if (targetChild) {
                hasil = {
                    childId: targetChild.id,
                    childLabel: targetChild.label,
                    parentId: parent.id,          // Ini parent ID (contoh: 'pendahuluan' atau 'memulai')
                    parentLabel: parent.label,    // Label parent (opsional, untuk kelengkapan)
                    section: sec.section          // Ini nama section-nya (contoh: 'Mulai')
                };
                break; // Hentikan loop item jika sudah ketemu
            }
        }
        if (hasil) break; // Hentikan loop section jika sudah ketemu
    }
    return hasil;
}

/**
 * Update breadcrumb dengan current page info
 * @param {string} pageId - Page ID
 */
function updateBreadcrumb(pageId) {
    const page = getSectionAndParent(pageId);
    if (!page) return;

    const bcSection = getElement(SELECTORS.bcSection)
    const bcCurrent = getElement(SELECTORS.bcCurrent);
    const subBcCurrent = getElement(SELECTORS.subBcCurrent);
    if (bcSection) {
        bcSection.textContent = `${page.section}`
    }
    if (bcCurrent) {
        bcCurrent.textContent = `${page.parentLabel}`;
    }
    if (subBcCurrent) {
        subBcCurrent.textContent = `${page.childLabel}`;
    }
}


// ============================================================
// SIDEBAR STATE FUNCTIONS
// ============================================================

/**
 * Buka sidebar (responsif untuk mobile dan desktop)
 */
function openSidebar() {
    const sidebar = getElement(SELECTORS.sidebar);
    const overlay = getElement(SELECTORS.sidebarOverlay);
    const mainWrapper = getElement(SELECTORS.mainWrapper);
    const toggleBtn = getElement(SELECTORS.btnToggleSidebar);

    if (isMobile()) {
        // Mobile: gunakan class 'open' dan overlay
        toggleClass(sidebar, 'open', true);
        toggleClass(overlay, 'active', true);
        document.body.style.overflow = 'hidden';
    } else {
        // Desktop: hapus class 'collapsed'
        toggleClass(sidebar, 'collapsed', false);
        toggleClass(mainWrapper, 'sidebar-collapsed', false);
        toggleClass(toggleBtn, 'collapsed', false);
    }
}

/**
 * Tutup sidebar (responsif untuk mobile dan desktop)
 */
function closeSidebar() {
    const sidebar = getElement(SELECTORS.sidebar);
    const overlay = getElement(SELECTORS.sidebarOverlay);
    const mainWrapper = getElement(SELECTORS.mainWrapper);
    const toggleBtn = getElement(SELECTORS.btnToggleSidebar);

    if (isMobile()) {
        // Mobile: hapus class 'open' dan overlay
        toggleClass(sidebar, 'open', false);
        toggleClass(overlay, 'active', false);
        document.body.style.overflow = '';
    } else {
        // Desktop: tambah class 'collapsed'
        toggleClass(sidebar, 'collapsed', true);
        toggleClass(mainWrapper, 'sidebar-collapsed', true);
        toggleClass(toggleBtn, 'collapsed', true);
    }
}

// ============================================================
// SEARCH FUNCTIONS
// ============================================================

/**
 * Highlight match text dalam string
 * @param {string} text - Text untuk di-highlight
 * @param {string} query - Query string
 * @returns {string} - HTML dengan highlight
 */
function highlightMatch(text, query) {
    const idx = text.toLowerCase().indexOf(query);
    if (idx === -1) return text;
    
    const before = text.substring(0, idx);
    const match = text.substring(idx, idx + query.length);
    const after = text.substring(idx + query.length);
    
    return `${before}<span style="color:var(--accent);font-weight:700">${match}</span>${after}`;
}

/**
 * Cari halaman berdasarkan query
 * @param {string} query - Search query
 * @returns {Array} - Array hasil pencarian
 */
function searchPages(query) {
    const results = [];
    
    Object.keys(pageContents).forEach(id => {
        const page = pageContents[id];
        // Cari di judul, deskripsi, dan konten HTML
        const searchText = (page.title + ' ' + page.desc + ' ' + page.html).toLowerCase();
        // Strip HTML tags untuk pencarian yang lebih akurat
        const plainText = searchText.replace(/<[^>]*>/g, ' ');
        const parent = getSectionAndParent(id);
        if (plainText.includes(query)) {
            results.push({ id, title: page.title, parent: parent.parentLabel });
        }
    });
    
    return results;
}

/**
 * Build dan render search results
 * @param {Array} matches - Array hasil pencarian
 * @param {string} query - Query string
 * @returns {string} - HTML untuk search results
 */
function buildSearchResultsHtml(matches, query) {
    if (matches.length === 0) {
        return `<div style="padding:16px;text-align:center;color:var(--text-muted);font-size:13px">Tidak ditemukan hasil untuk "${query}"</div>`;
    }
    
    return matches.slice(0, SEARCH.maxResults).map(m => `
        <div class="search-result-item" data-page-id="${m.id}">
          <div class="sr-title">${highlightMatch(m.title, query)}</div>
          <div class="sr-path">${m.parent}</div>
        </div>
    `).join('');
}

/**
 * Bind event listeners untuk search results
 * @param {Element} resultsContainer - Container untuk search results
 * @param {Element} searchInput - Input element
 */
function bindSearchResultsEvents(resultsContainer, searchInput) {
    resultsContainer.querySelectorAll(CLASSES.searchResultItem).forEach(item => {
        item.addEventListener('click', () => {
            const pageId = item.getAttribute('data-page-id');
            navigateTo(pageId);
            searchInput.value = '';
            resultsContainer.classList.remove('visible');
        });
    });
}

/**
 * Setup search functionality
 */
function setupSearch() {
    const input = getElement(SELECTORS.searchInput);
    const results = getElement(SELECTORS.searchResults);
    const topbarSearch = getElement(SELECTORS.topbarSearch);

    if (!input || !results) return;

    // Event: input search
    input.addEventListener('input', function() {
        const query = this.value.trim().toLowerCase();
        
        if (query.length < SEARCH.minQueryLength) {
            results.classList.remove('visible');
            results.innerHTML = '';
            return;
        }

        const matches = searchPages(query);
        results.innerHTML = buildSearchResultsHtml(matches, query);
        results.classList.add('visible');

        // Bind event untuk hasil pencarian
        bindSearchResultsEvents(results, input);
    });

    // Event: tutup hasil saat klik di luar
    document.addEventListener('click', function(e) {
        if (!topbarSearch?.contains(e.target)) {
            results.classList.remove('visible');
        }
    });

    // Event: Escape menutup hasil
    input.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            results.classList.remove('visible');
            this.blur();
        }
    });
}

// ============================================================
// UTILITY UI FUNCTIONS
// ============================================================

/**
 * Tampilkan toast notification
 * @param {string} message - Pesan notifikasi
 * @param {string} icon - Icon class (FontAwesome)
 */
function showToast(message, icon) {
    const container = getElement(SELECTORS.toastContainer);
    if (!container) return;

    const toast = document.createElement('div');
    toast.className = 'toast-msg';
    toast.innerHTML = `<i class="${icon || 'fas fa-check-circle'}"></i> ${message}`;
    container.appendChild(toast);

    // Fade out animation
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(40px)';
        toast.style.transition = 'all 0.3s ease';
        
        setTimeout(() => toast.remove(), TIMEOUTS.toastFadeOutDuration);
    }, TIMEOUTS.toastDuration);
}

/**
 * Setup scroll-to-top button
 */
function setupScrollTop() {
    const btn = getElement(SELECTORS.scrollTopBtn);
    if (!btn) return;

    // Event: scroll
    window.addEventListener('scroll', function() {
        if (window.scrollY > TIMEOUTS.scrollThreshold) {
            btn.classList.add('visible');
        } else {
            btn.classList.remove('visible');
        }
    });

    // Event: click button
    btn.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

/**
 * Setup keyboard shortcuts
 */
function setupKeyboardShortcuts() {
    document.addEventListener('keydown', function(e) {
        // Ctrl+K atau / untuk fokus pencarian
        const isCtrlK = e.ctrlKey && e.key === 'k';
        const isSlash = e.key === '/' && document.activeElement.tagName !== 'INPUT';
        
        if (isCtrlK || isSlash) {
            e.preventDefault();
            const searchInput = getElement(SELECTORS.searchInput);
            
            if (searchInput) {
                searchInput.focus();
                if (isMobile()) {
                    // Di mobile, buka sidebar agar search input terlihat
                    openSidebar();
                }
            }
        }
    });
}

// ============================================================
// INITIALIZATION
// ============================================================

/**
 * Initialize aplikasi saat DOM loaded
 */
document.addEventListener('DOMContentLoaded', function() {
    // Initialize theme before rendering to prevent FOUC
    initTheme();

    // Load saved navigation state
    //loadNavigationState();

    // Setup sidebar
    if (expandedMenus.size === 0) {
        expandedMenus.add('pendahuluan');
    }
    renderSidebar();

    // Mark as restoring state
    isRestoringState = true;

    // Render halaman terakhir yang dilihat (skip scroll to top)
    navigateTo(currentPage, null, true);

    // Double rAF: pastikan navigateTo() sudah selesai update DOM
    /*
    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            restoreSidebarScrollPosition();
            isRestoringState = false;
        });
    });
     */

    // Setup fitur
    setupSearch();
    setupScrollTop();
    setupKeyboardShortcuts();
    setupThemeToggle();

    // Toggle sidebar button
    const toggleBtn = getElement(SELECTORS.btnToggleSidebar);
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function() {
            const sidebar = getElement(SELECTORS.sidebar);

            if (isMobile()) {
                if (sidebar?.classList.contains('open')) {
                    closeSidebar();
                } else {
                    openSidebar();
                }
            } else {
                if (sidebar?.classList.contains('collapsed')) {
                    openSidebar();
                } else {
                    closeSidebar();
                }
            }
        });
    }

    // Overlay click tutup sidebar
    const overlay = getElement(SELECTORS.sidebarOverlay);
    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }

    // Save sidebar scroll position on scroll (debounced)
    let scrollSaveTimer;
    const sidebar = getElement(SELECTORS.sidebarNav);
    if (sidebar) {
        sidebar.addEventListener('scroll', () => {
            clearTimeout(scrollSaveTimer);
            scrollSaveTimer = setTimeout(() => {
                saveSidebarScrollPosition();
            }, 100);
        });
    }

    // Toast selamat datang
    setTimeout(() => {
        showToast('Selamat datang di Panduan Pengguna GarudaCBT', 'fas fa-hand-sparkles');
    }, TIMEOUTS.welcomeDelay);
});