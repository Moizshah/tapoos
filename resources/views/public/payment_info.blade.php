	@extends('public.layout.app')
		@section('breadcrumb')
	<ul class="page-breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li>My Payment Info</li>
                    </ul>
                    @stop
	@section('content')
	<div class="row">

		<div class="col-md-10 col-sm-10">
			<div class="portlet-body form">
				
				<form id="edit-form" role="form" method="post" action="my_payment_info/update">
					
									<div class="form-group">
										<p class="alert alert-info">
											<i>Please make sure the payment info you enter is correct and verified.</i>
										</p>
										<label>Account Title</label>
										<input type="text" class="form-control select2" name="account_title" data-validetta="required" value="">
									</div>
									<div class="form-group">
										<label>Account Details</label>
										<textarea class="form-control" rows="6" name="account_detail" data-validetta="required"></textarea>
										<p class="help-block">this should include details such as account number,
									

						<div class="box-footer">
							<button type="submit" class="btn btn-primary" name="update" value="1">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	@stop