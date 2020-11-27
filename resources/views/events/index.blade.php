<x-master>
    <section class="shadow-sm bg-white my-2 rounded">
        @include ('_flash-message')
        <div class="border-bottom pt-4 pb-3 pl-3">
            <h3>Calendar</h3>

        </div>

        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-3">
                    @include ('events._form')
                </div>
                <div class="col-md-9">
                    <h4 class="border-bottom py-3 mb-0">{{ $currentMonth }}</h4>
                    <div id="calendar">
                        @include ('events._calendar')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script type="text/javascript">
            $(function () {
                $('#from').datepicker({
                    format: 'yyyy-mm-dd'
                });

                $('#to').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });

            $('#btn-submit').click(function (e) {
                e.preventDefault();
                let data = $('#event-form').serializeArray();
                $('.error-message').text('');
                $.ajax({
                    type:'POST',
                    url:"{{ route('event.store') }}",
                    data: data,
                    success:function(response){
                        $('#calendar').html(response.calendar);
                        $('#alert-message span').html(response.message);
                        $('#alert-message').fadeIn();
                        setTimeout(function () {
                            $('#alert-message').fadeOut();
                        }, 3000);
                    },
                    error:function(response) {
                        $.each(response.responseJSON.errors, function (key, value) {
                            $(`#${key}-error`).text(value);
                        });
                    }
                });
            });
        </script>
    @endpush
</x-master>