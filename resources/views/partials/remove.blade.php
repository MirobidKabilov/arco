<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog delete-modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Удалить</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                
            </div>
            <div class="modal-body">
                Вы действительно хотите удалить?
            </div>
            <div class="modal-footer">
                <form action="" id="delete_form">
                    <input type="hidden" name="id" id="delete_id">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Нет</button>
                    <button type="submit" class="btn btn-default ajax-remove">Да</button>
                </form>
            </div>
        </div>
    </div>
</div>