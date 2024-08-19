<div>
    <form wire:submit="submitRequest">
        @csrf

        <div class="message">
            @if (session()->has('success'))   
                <div class="flex alert-success" role="alert" 
                    x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 5000)" x-show="show">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="message">
            @if (session()->has('error'))   
                <div class="flex alert-danger" role="alert"
                    x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 5000)" x-show="show">
                    <span class="font-medium">Error! &nbsp;</span>{{ session('error') }}
                </div>
            @endif
        </div>

        <div class="mt-5">
            {{ $this->form }}
        </div>
        
        <div class="flex justify-end mt-5">
            <button type="submit" class="button-primary" x-on:click="scrollToTop">
                Submit
            </button>
        </div>
    </form>
</div>

<script>
    function scrollToTop() {
        setTimeout(() => {
            //grecaptcha.reset(); // reset captcha
            window.scrollTo({top: 0, behavior: 'smooth'});
        }, 1000);
    }
</script>

