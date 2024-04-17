document.addEventListener("DOMContentLoaded", function() {

    setScore(1);

    var selectedType = "{{ request()->input('type') }}";
    var radioButtons = document.querySelectorAll('input[type=radio][name="type"]');

    radioButtons.forEach(function(radioButton) {
        if (radioButton.value === selectedType) {
            radioButton.nextElementSibling.classList.add('bg-blue-700');
        }

        radioButton.addEventListener('click', function() {
            radioButtons.forEach(function(btn) {
                btn.nextElementSibling.classList.remove('bg-blue-700');
            });
            this.nextElementSibling.classList.add('bg-blue-700');
        });
    });
});

function setScore(score) {

        document.getElementById('score').value = score;

    for (let i = 1; i <= 5; i++) {
        let star = document.getElementById('star' + i);
        if (i <= score) {
            star.classList.remove('far', 'fa-star', 'text-gray-500');
            star.classList.add('fas', 'fa-star', 'text-yellow-500');
        } else {
            star.classList.remove('fas', 'fa-star', 'text-yellow-500');
            star.classList.add('far', 'fa-star', 'text-gray-500');
        }
    }
}


function scrollToBottom() {
    document.getElementById('bottom').scrollIntoView({ behavior: 'smooth', block: 'end', inline: 'nearest' });
}

document.addEventListener('DOMContentLoaded', function () {
    const filterButton = document.getElementById('filterButton');
    const filterOptions = document.getElementById('filterOptions');

    filterButton.addEventListener('click', function () {
        filterOptions.classList.toggle('hidden');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const showSellersButton = document.getElementById('showSellers');
    const showBuyersButton = document.getElementById('showBuyers');
    const sellersTable = document.getElementById('sellersTable');
    const buyersTable = document.getElementById('buyersTable');

    buyersTable.classList.add('hidden');

    showSellersButton.addEventListener('click', function () {
        sellersTable.classList.remove('hidden');
        buyersTable.classList.add('hidden');
    });

    showBuyersButton.addEventListener('click', function () {
        sellersTable.classList.add('hidden');
        buyersTable.classList.remove('hidden');
    });
});



var jqueryScript = document.createElement('script');
jqueryScript.src = 'https://code.jquery.com/jquery-3.6.0.min.js';

document.head.appendChild(jqueryScript);

jqueryScript.onload = function() {
    $(document).ready(function(){
        $('#sellersTable th').click(function(){
            sortTable($(this).parents('table').eq(0), $(this).index());
            toggleArrow($(this));
        });
        $('#buyersTable th').click(function(){
            sortTable($(this).parents('table').eq(0), $(this).index());
            toggleArrow($(this));
        });
    });

    function sortTable(table, column) {
        var rows = table.find('tr:gt(0)').toArray().sort(comparer(column));
        this.asc = !this.asc;
        if (!this.asc) { rows = rows.reverse() }
        for (var i = 0; i < rows.length; i++) { table.append(rows[i]) }
    }

    function comparer(index) {
        return function(a, b) {
            var valA = getCellValue(a, index), valB = getCellValue(b, index)
            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
        }
    }

    function getCellValue(row, index){ return $(row).children('td').eq(index).text() }

    function toggleArrow(element) {
        element.closest('table').find('th .arrow-up, th .arrow-down').remove();

        if (this.asc) {
            element.append('<span class="inline-block ml-1 arrow-up">&#9650;</span>'); // Arrow up
        } else {
            element.append('<span class="inline-block ml-1 arrow-down">&#9660;</span>'); // Arrow down
        }
    }
};










