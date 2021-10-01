@props(['nameForm'])

<div class="content-wrapper pt-3">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-purple">
            <div class="card-header">
              <h3 class="card-title">{{$nameForm}}</h3>
            </div>

            {{$slot}}
          </div>
          <!-- /.card -->
          </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
<!-- /.content -->
</div>