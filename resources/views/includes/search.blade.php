<div class="container">
    <div class="row">
        <div class="col-md-7">
            <form action="{{ route('search') }}" method="GET" onsubmit="convertToUpperCase()">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search name" aria-label="Recipient's username" aria-describedby="search-button" id="search-input" name="search">
                    <button class="btn maroon-button" type="submit" id="search-button"><i class="fa fa-search color-white"></i></button>
                </div>
            </form>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col text-center">
                    <div class="row mt-2">
                        <div class="col">
                            <strong>Show Status Statistic</strong>
                        </div>
                        <div class="col-2">
                            <input id="show-status-checkbox" class="form-check-input" type="checkbox" value="" aria-label="">
                        </div>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="row mt-2">
                        <div class="col">
                            <strong>Show Rank Statistic</strong>
                        </div>
                        <div class="col col-2">
                            <input id="show-rank-checkbox" class="form-check-input" type="checkbox" value="" aria-label="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
