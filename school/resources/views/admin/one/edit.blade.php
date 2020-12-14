@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit one
        </h1>
        <span class="breadcrumb"><a href='{{ route("one.index") }}' class="btn btn-sm btn-primary"><i
                    class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Go To one</a></span>
    </section>
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                {!! Form::model($one, ['route' => ['one.update', $one->id], 'method' => 'patch', 'files' => 'true']) !!}

                    <div class="form-group col-sm-12">
                        {!! Form::label('title', 'Title:') !!} <span class="text-danger">*</span>
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('title'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                       @endif
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="user_select">Select Article</label><br/>
                        
                        <select class="form-control" name="article_id">
                        @foreach($articles as $article)
                                <option value="{{( $article->id )}}" @if($article->id == $one->article_id) selected @endif>
                                    {{ $article->title }}
                                </option>   
                        @endforeach
                        </select>
                        
                    </div>
                    
                    <div class="form-group col-sm-12">
                       {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                       <a href="{!! route('one.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
               {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
   
@endsection