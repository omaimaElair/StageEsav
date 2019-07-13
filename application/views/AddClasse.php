<?php 
 include('includes/header.php');?>

<style>
.row{
    margin: 80px
}
</style>

			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Select 2 Dropdowns
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<?php foreach ($data_filiere->result() as $row)
							{
									echo $row->FiliereNom;
							} ?>
							<form action="#" class="form-horizontal form-row-sepe">
								<div class="form-body">
                                    <h4 class="form-section">Fixed Width</h4>
                                    
                                    <div>
                                    
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Filiere</label>
                                            <div class="col-md-4">
                                                <select id="filiere" class="form-control input-medium select2me" data-placeholder="Select...">
												<option value=""></option>
												<?php 
													if($data_filiere->num_rows() > 0)
													{
														foreach($data_filiere->result() as $row )
														{
												?>
														<option value="<?php echo $row->FiliereNom ?>"><?php echo $row->FiliereNom ?></option>
													<?php
														}
													}
													else
													{
													?>
														<option value="Design">no data found</option>
													<?php
													}
													?>

                                                </select>
                                                <span class="help-block">
                                                .input-medium </span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Niveau</label>
                                            <div class="col-md-4">
                                                <select class="form-control input-medium select2me" data-placeholder="Select...">
                                                    <option value=""></option>
                                                    <option value="Design">Design</option>
                                                    <option value="Audio_Visio">Audio Visio</option>
                                                </select>
                                                <span class="help-block">
                                                .input-medium </span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Option</label>
                                            <div class="col-md-4">
                                                <select class="form-control input-medium select2me" data-placeholder="Select...">
                                                    <option value=""></option>
                                                    <option value="Design">Design</option>
                                                    <option value="Audio_Visio">Audio Visio</option>
                                                </select>
                                                <span class="help-block">
                                                .input-medium </span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Annee Universitaire</label>
                                            <div class="col-md-4">
                                                <select class="form-control input-medium select2me" data-placeholder="Select...">
                                                    <option value=""></option>
                                                    <option value="Design">Design</option>
                                                    <option value="Audio_Visio">Audio Visio</option>
                                                </select>
                                                <span class="help-block">
                                                .input-medium </span>
                                            </div>
                                        </div>
                                    
                                    </div>
									
								
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn purple"><i class="fa fa-check"></i> Submit</button>
											<button type="button" class="btn default">Cancel</button>
										</div>
									</div>
								</div>
							</form>
							
							<!-- END FORM-->
						</div>
					</div>
				</div>
            </div>
            <!-- END PAGE CONTENT-->
            
 <?php
 include('includes/footer.php');
 include('includes/scripts.php');

 ?>
