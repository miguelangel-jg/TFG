$(document).ready(function () {
    $('#user-search').on('input', function () {
        const query = $(this).val();
        if (query.length >= 2) {
            $.get("/search", { q: query }, function (data) {
                let results = '';
                if (data.length > 0) {
                    data.forEach(user => {
                        results += `
                            <li>
                                <a href="/search/${user.name}">
                                    <img src="${user.image_url}" alt="${user.name}'s profile picture" class="profile-picture">
                                    ${user.name}
                                </a>
                            </li>`;
                    });
                } else {
                    results = '<li>No se encontraron usuarios.</li>';
                }
                $('#search-results').html(results).show();
            });
        } else {
            $('#search-results').empty().hide();
        }
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest('#user-search, #search-results').length) {
            $('#search-results').hide();
        }
    });
});
