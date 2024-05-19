<div class="col py-2" onclick="redirectToCollege({{ $faculty->college->collegeid }})">
    <div class="container py-2 bg-white rounded custom-container border">
        <img src="{{ $faculty->photo ? asset(str_replace('\\', '/', $faculty->photo)) : asset('img/660f6e5997de4_def.jpg') }}" class="rounded img-fluid" alt="...">
        <h6 class="text-center mt-2 text-maroon"><strong>{{ $faculty->college->college_name }}</strong></h6>
        <div class="container" style="display: flex; justify-content: center;">
            <div style="width: 30%;">
                <hr style="width: 100%; border: 1px solid;">
            </div>
        </div>
        <h6 class="text-center"><strong>{{ $faculty->name }}</strong></h6>
        <h6 class="text-center">Dean of {{ $faculty->deanText }}</h6>
    </div>
</div>
