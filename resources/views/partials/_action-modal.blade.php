<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content pb-5">
            <div class="">
                <h5 class="text-center pt-3 pb-3" id="updateModalLabel">
                    @isset($title)
                     {{$title}}
                    @else
                     Mise à jours des Informations    
                    @endisset
                </h5>
            </div>
            <div id="form" class="p-3">
                <div id="loader">
                    @include("partials._small-loader")
                </div>
            </div>
        </div>
    </div>
</div>