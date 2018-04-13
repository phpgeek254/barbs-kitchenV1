<div id="delete_form_{{ $image->id }}" class="modal">
    <div class="modal-content">
        <div class="card-image">
            {!! Html::image($image->image_path, null, ['class'=>'responsive-img', 'style'=>'max-height:250px;']) !!}
            <span class="card-title">{{ $image->caption }}</span>
        </div>
        {!! Form::open(['route'=>['gallery_image.destroy', $image->id], 'method'=>'delete']) !!}
        <h6 class="center">
            Are you sure you want to delete this image ??
        </h6>
        <div class="button" style="margin: 10px;">
            {!! Form::submit('Delete', ['class'=>'btn']) !!}
            <a href="#!" style="float: right;" class="modal-action modal-close btn">Cancel</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>