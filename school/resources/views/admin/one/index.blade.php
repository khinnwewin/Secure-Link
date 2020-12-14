@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>
           Ones
        </h1>
        
       <span class="breadcrumb"><a href='{{ route("one.create") }}' class="btn btn-sm btn-primary"><i
                class="fa fa-plus-square"></i>&nbsp;&nbsp;Create New One</a></span>
    </section>
    <div class="content">
        {{-- <div class="row">
            <form method="GET">
                <div class="form-group col-sm-3 mmtext">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <a href="{!! route('one.index') !!}" class="btn btn-info">Clear</a>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div> --}}
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-striped table-hover tbl_repeat" id="sortable">
                    <thead>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Article</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                    <?php $index = 1; ?>
                    @foreach($ones as $one)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{!! $one->title !!}</td>  
                            <td>{!! getarticle($one->article_id)!!}</td>
                            
                            <td>
                            <a href="{!! route('one.edit', [$one->id]) !!}"
                               class='btn btn-xs btn-primary'><i class="fa fa-check-square-o"></i>&nbsp;Edit</a>
                            <a href="#" type="button" data-id="{{ $one->id }}"
                               class="btn btn-xs btn-danger" data-toggle="modal"
                               data-url="{{ url('admin/one/'.$one->id) }}"
                               data-target="#deleteFormModal"><i
                                    class="fa fa-trash-o"></i>&nbsp;Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{ $ones->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection