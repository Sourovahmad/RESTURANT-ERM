if (role_id == 2 || role_id == 1) {

    setInterval(function () {
        $.ajax({
            url: "{{ route('print-order-kitchen') }}",
            type: 'GET',
            success: function (data) {
                console.log(data);
            },

            error: function (data) {
                console.log('error');
            },

        });

    }, 30000);

    setInterval(function () {
        $.ajax({
            url: "{{ route('print-memo') }}",
            type: 'GET',
            success: function (data) {
                console.log(data);
            },

            error: function (data) {
                console.log('error');
            },

        });

    }, 15000);
}
