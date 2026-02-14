document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const sortBy = document.getElementById('sortBy');
    const resultCount = document.getElementById('resultCount');
    let courseCards = [];

    // Initialize the page
    function init() {
        courseCards = Array.from(document.querySelectorAll('.course-card'));
        updateResultCount();
        
        // Add event listeners with debounce for search input
        searchInput.addEventListener('input', debounce(filterAndSortCourses, 300));
        categoryFilter.addEventListener('change', filterAndSortCourses);
        sortBy.addEventListener('change', filterAndSortCourses);
        
        // Trigger initial sort
        filterAndSortCourses();
    }

    // Debounce function to limit how often the search runs
    function debounce(func, wait) {
        let timeout;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
    }

    function filterAndSortCourses() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const selectedCategory = categoryFilter.value.toLowerCase();
        const sortByValue = sortBy.value;
        let visibleCount = 0;

        // Filter cards
        courseCards.forEach(card => {
            const title = card.getAttribute('data-title');
            const description = card.querySelector('.course-description')?.textContent.toLowerCase() || '';
            const category = card.getAttribute('data-category');
            
            // Check if card matches search term
            const matchesSearch = searchTerm === '' || 
                                title.toLowerCase().includes(searchTerm) || 
                                description.includes(searchTerm);
            
            // Define category mappings
            const categoryMappings = {
                'programming': ['python', 'full stack', 'development'],
                'networking': ['ccna', 'ccnp', 'cisco', 'network'],
                'security': ['security', 'cyber', 'ansible'],
                'cloud': ['azure', 'cloud', 'aws'],
                'marketing': ['marketing', 'digital', 'seo', 'sem']
            };
            
            // Check if card matches selected category
            let matchesCategory = !selectedCategory;
            if (selectedCategory) {
                const keywords = categoryMappings[selectedCategory] || [];
                matchesCategory = keywords.some(keyword => 
                    title.toLowerCase().includes(keyword) || 
                    description.includes(keyword) ||
                    category.includes(keyword)
                );
            }

            if (matchesSearch && matchesCategory) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Sort visible cards
        const container = document.querySelector('.row');
        const visibleCards = courseCards.filter(card => card.style.display !== 'none');
        
        visibleCards.sort((a, b) => {
            if (sortByValue === 'title') {
                return a.getAttribute('data-title').localeCompare(b.getAttribute('data-title'));
            } else if (sortByValue === 'duration') {
                return parseDuration(a.getAttribute('data-duration')) - parseDuration(b.getAttribute('data-duration'));
            }
            return 0;
        });

        // Re-append cards in new order
        visibleCards.forEach(card => container.appendChild(card));
        updateResultCount(visibleCount);
    }

    function parseDuration(duration) {
        const num = parseInt(duration);
        if (duration.includes('Month')) return num * 30;
        if (duration.includes('Week')) return num * 7;
        if (duration.includes('Year')) return num * 365;
        return num;
    }

    function updateResultCount(visible) {
        const total = courseCards.length;
        const visibleCount = visible !== undefined ? visible : total;
        resultCount.textContent = `Showing ${visibleCount} of ${total} courses`;
    }

    // Initialize the page
    init();
});
