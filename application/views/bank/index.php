<div class="content-w">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url();?>">Home</a></li>
            <li class="breadcrumb-item"><span><?=$title;?></span></li>
          </ul>
          <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
          <div class="content-i">
            <div class="content-box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">

                    <div class="users-list-w element-header">
									   <a href="<?=base_url('bank/name/'.$result->id);?>" style="text-decoration: none;">
									   <div class="user-w with-status status-green">
									      <div class="user-avatar-w">
									         <div class="user-avatar"><?=img('uploads/bank/'.$result->s_icon.'','50');?></div>
									      </div>
									      <div class="user-name">
									         <h6 class="user-title"><?=$result->s_name;?> Dashboard</h6>
									         <div class="user-role"><?=$result->s_fname_en;?></div>
									      </div>
									      <div class="user-action">
									         <div class="os-icon os-icon-coins4"></div>
									      </div>
									   	</div>
									   	</a>
										</div>
                    <div class="element-content">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="element-box el-tablo">
                            <div class="label">Balance</div>
                            <div class="value">400</div>
                            <!--<div class="trending trending-up"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div>-->
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="element-box el-tablo">
                            <div class="label">Deposit</div>
                            <div class="value">457</div>
                            <!--<div class="trending trending-down-basic"><span>12%</span><i class="os-icon os-icon-arrow-2-down"></i></div>-->
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="element-box el-tablo">
                            <div class="label">Withdraw</div>
                            <div class="value">57</div>
                            <!--<div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-graph-down"></i></div>-->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="element-wrapper">
                    <h6 class="element-header">Recent Transections</h6>
                    <div class="element-box-tp">
                      <div class="controls-above-table">
                        <div class="row">
                          <div class="col-sm-6"><!--<a class="btn btn-sm btn-secondary" href="#">Download CSV</a><a class="btn btn-sm btn-secondary" href="#">Archive</a><a class="btn btn-sm btn-danger" href="#">Delete</a>--></div>
                          <div class="col-sm-6">
                            <form class="form-inline justify-content-sm-end">
                              <!--<input class="form-control form-control-sm rounded bright" placeholder="Search" type="text">-->
                              <select class="form-control form-control-sm rounded bright">
                                <option selected="selected" value="">Select Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Active">Active</option>
                                <option value="Cancelled">Cancelled</option>
                              </select>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-bordered table-lg table-v2 table-striped">
                          <thead>
                            <tr>
                              <th class="text-center"><input class="form-control" type="checkbox"></th>
                              <th>Customer Name</th>
                              <th>Country</th>
                              <th>Order Total</th>
                              <th>Referral</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                          for($i=1; $i <= 10; $i++){
                          ?>
                            <tr>
                              <td class="text-center"><input class="form-control" type="checkbox"></td>
                              <td>John Mayers</td>
                              <td><img alt="" src="assets/img/flags-icons/us.png" width="25px"></td>
                              <td class="text-right">$245</td>
                              <td>Organic</td>
                              <td class="text-center">
                                <div class="status-pill green" data-title="Complete" data-toggle="tooltip"></div>
                              </td>
                            </tr>
                            <?php } ?>

                          </tbody>
                        </table>
                      </div>
                      <div class="controls-below-table">
                        <div class="table-records-info">Showing records 1 - 10</div>
                        <div class="table-records-pages">
                          <ul>
                            <li><a href="#">Previous</a></li>
                            <li><a class="current" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">Next</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>