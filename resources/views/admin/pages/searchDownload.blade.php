

<div class="searchboxForm">
    <div class="row">
        <div class="col-md-12">
            <h3> Search and Download </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="col-md-6">
                <div class="form-group">
                    <?php
                    $device_output_values=[''=>'Choose your device'] + $device_output_values;
                    $fcategory_output_values = [''=>'Choose your options'] + $fcategory_output_values + ['5'=>'Tutorial'];
                    ?>
                    {!! Form::select('device_id', $fcategory_output_values, '', ["class"=>"form-control permission-select chosen-select device-category"]) !!}
                    <span class="text-danger">{!! $errors->first('device_id') !!}</span>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::select('device_id', $device_output_values, '', ["class"=>"form-control permission-select chosen-select device-select"]) !!}
                    <span class="text-danger">{!! $errors->first('device_id') !!}</span>
                </div>
            </div>
        </div>
    </div>
</div>