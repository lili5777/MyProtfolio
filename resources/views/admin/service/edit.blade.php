<div class="modal" id="exampleModal-{{$sv->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modal-title">Edit Service</h3>
            <span class="close-modal">&times;</span>
        </div>
        <div class="modal-body">
            <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$sv->id}}">
                <div class="form-group">
                    <label for="service-name-{{$sv->id}}">Service Name</label>
                    <input type="text" id="service-name-{{$sv->id}}" name="name" value="{{$sv->name}}"
                        placeholder="Enter service name" required>
                </div>

                <div class="form-group">
                    <label for="service-icon-{{$sv->id}}">Icon</label>
                    <div class="file-upload-wrapper">
                        <label class="file-upload-label">
                            <input type="file" id="service-icon-{{$sv->id}}" name="icon" accept=".svg,.png">
                            <span class="file-upload-custom">
                                <i class="ti-cloud-up"></i>
                                <span class="file-upload-text">Choose icon file...</span>
                                <span class="file-name" id="file-name-{{$sv->id}}">No file chosen</span>
                            </span>
                        </label>
                        <div class="file-requirements">
                            <small>Recommended: SVG or PNG (100×100px)</small>
                        </div>
                    </div>
                    <div class="icon-preview" id="icon-preview-{{$sv->id}}">
                        <img id="preview-image-{{$sv->id}}" src="{{asset('assets/imgs/' . $sv->icon)}}"
                            alt="Icon preview" style="max-width: 100px;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="service-desc-{{$sv->id}}">Description</label>
                    <textarea id="service-desc-{{$sv->id}}" name="desc" rows="3" placeholder="Enter service description"
                        required>{{$sv->desc}}</textarea>
                </div>

                <div class="form-footer">
                    <button type="button" class="btn btn-secondary close-modal-btn">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Service</button>
                </div>
            </form>
        </div>
    </div>
</div>