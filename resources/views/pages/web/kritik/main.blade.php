<x-app-layout title="kritik">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel">Kritik & Saran</h5>
                            </div>
                            @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form action="{{ route('web.kritik.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" id="id-field">
                                    <div class="mb-3">
                                        <label for="customername-field" class="form-label">Kritik & Saran</label>
                                        <textarea name="kritik_saran" class="form-control"></textarea>
                                    </div>
                                    @error('kritik_saran')
                                        <div class="alert-alert danger">{{ $message}}</div>
                                    @enderror
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="submit" class="btn btn-primary" id="add-btn">Tambah Kritik&saran</button> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
</x-app-layout>