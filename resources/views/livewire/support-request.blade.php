<div>
    <form wire:submit="submitRequest">
        @csrf

        <div id="message">
            @if (session()->has('success'))   
                <div class="flex alert-success" role="alert">
                    {{ session('success') }}
                </div>

                <script>
                    var elmnt = document.getElementById("message");
                    elmnt.scrollIntoView();
                </script>
            @endif
        </div>

        <div>
            @if (session()->has('error'))   
                <div class="flex alert-danger" role="alert">
                    <span class="font-medium">Error! </span>{{ session('error') }}
                </div>
            @endif
        </div>

        <div class="mt-5">
            {{ $this->form }}
        </div>
        
        <div class="flex justify-end mt-5">
            <button type="submit" class="button-primary">
                Submit
            </button>
        </div>
    </form>
</div>
