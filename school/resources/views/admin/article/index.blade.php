@extends('admin.layout.app')
@section('content')
    <section class="content-header">
        <h1>
        Activities
        </h1>
      <span class="breadcrumb"><a href='{{ route("article.create") }}' class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Create New Activities</a></span>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <!-- Flash -->
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table class="table table-striped table-hover tbl_repeat" id="sortable">
                    <thead>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Description</th>                   
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>
                    <?php $index = 1; ?>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $index++ }}</td> 
                            <td>{!! $article->title !!}</td>
                            <td>{!! $article->description !!}</td>
                            <td>
                            <a href="{!! route('article.edit', [$article->id]) !!}"
                               class='btn btn-xs btn-primary'><i class="fa fa-check-square-o"></i>&nbsp;Edit</a>
                            <a href="#" type="button" data-id="{{ $article->id }}"
                               class="btn btn-xs btn-danger" data-toggle="modal"
                               data-url="{{ url('admin/article/'.$article->id) }}"
                               data-target="#deleteFormModal"><i
                                    class="fa fa-trash-o"></i>&nbsp;Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{ $articles->appends($_GET)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection