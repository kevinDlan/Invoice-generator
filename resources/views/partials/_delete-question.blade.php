<div id="delete-response" class="text-center mt-2">
    <p class="fw-bold fs-5 mb-2">Voulez-vous vraiment supprimer ?</p>
    <button type="button" class="btn btn-info text-white" data-bs-dismiss="modal"><i
            class="fa fa-xmark"></i>Annuler</button>
    <a id="delete-btn" href="" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Oui</a>
    <form id="delete-form" method="POST">@method('DELETE')@csrf</form>
</div>