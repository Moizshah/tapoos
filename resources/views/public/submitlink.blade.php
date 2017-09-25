@extends('public.layout.app')
@section('breadcrumb')
    <ul class="page-breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li>Submit a Link</li>
                    </ul>
                    @stop
@section('content')
<div class="row">

	<div class="col-md-10 col-sm-10">
		<div class="portlet-body form">
			
			<form id="edit-form" role="form" method="post" action="submit_link/submit">
				<div class="box box-default">
					<div class="box-body">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<p class="help-block">
										<i>If you find a good content elsewhere and want us to include on our website too,
										submit the link here.</i>
									</p>
									<label>Link</label>
									<input type="text" class="form-control select2" name="custom_link" data-validetta="required">
								</div>
							</div>
						</div>

					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-primary" name="submit" value="1">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@stop