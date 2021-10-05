@props(['nameForm'])


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
    <!--/.col (right) -->
</div>