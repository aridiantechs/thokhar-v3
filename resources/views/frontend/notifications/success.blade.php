@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show text-{{$align}} font-arabic" role="alert">
    <div class="alert-icon">
       <i class="fas fa-check"></i>
    </div>
     <h5>
      رسالة الخطأ
    </h5>
    <p class="text-dark">{{ session('success') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

