<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center><b>Information</b></center>
    
    <div class="content table-m-50">
        {{-- <div class="row">
            <form method="GET">
                <div class="form-group col-sm-3 mmtext">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <a href="{!! route('information.index') !!}" class="btn btn-info">Clear</a>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div> --}}
        <div class="clearfix"></div>
        <div class="clearfix"></div>

        <!-- Flash -->
        
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <table>
                    <thead>
                        <th>No.</th>
                        <th>Title</th>
                        
                        <!-- <th colspan="3">Action</th> -->
                    </thead>
                    <tbody>
                    <?php $index = 1; ?>
                    @foreach($infos as $info)
                        <tr style="width: 100px;height: 50px;">
                            <td>{{ $index++ }}</td>
                            <td>{!! $info->title !!}</td>
                           
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{-- $infos->appends($_GET)->links() --}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>