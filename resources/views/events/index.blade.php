<x-master>
    <section class="shadow-sm bg-white my-2 rounded">
        <div class="border-bottom pt-4 pb-3 pl-3">
            <h3>Calendar</h3>

        </div>

        <div class="container-fluid">
            <div class="row mt-3">
                <div class="col-md-3">
                    @include ('events._form')
                </div>
                <div class="col-md-9">
                    @include ('_flash-message')

                    @include ('events._calendar')
                </div>
            </div>
        </div>
    </section>
</x-master>