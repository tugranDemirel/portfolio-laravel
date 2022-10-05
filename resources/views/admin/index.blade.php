@extends('admin.layouts.app')
@section('title', 'Home')
@section('content')
    <div class="page-body">
        <!-- Main Graph -->
        <div class="main-graph">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-6 col-md-8 col-lg-10 padding-0 overflow-hidden">
                    <div class="graph-area">
                        <div id="line_chart"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="stats-area overflow-hidden">
                        <div class="total">
                            <span class="col-success">$27 525</span>
                            <small>Total Income</small>
                        </div>

                        <div class="stats">$9 225</div>
                        <span data-type="bar" data-sparkline="true">3,4,3,7,12,9,9,5,8,8,8,12,14,20,16,14,20,12,10,14,8,4,4,5</span>
                        <p>MasterCard Payments</p>

                        <div class="stats">$9 300</div>
                        <span data-type="bar" data-sparkline="true">3,4,3,7,12,9,9,5,8,8,8,12,14,20,16,14,20,12,10,14,8,4,4,5</span>
                        <p>Visa Payments</p>

                        <div class="stats">$8 250</div>
                        <span data-type="bar" data-sparkline="true">3,4,3,7,12,9,9,5,8,8,8,12,14,20,16,14,20,12,10,14,8,4,4,5</span>
                        <p>Paypal Payments</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Main Graph -->
        <div class="row clearfix">
            <!-- Last 5 Comments -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">LAST 5 COMMENTS</div>
                    <div class="panel-body">
                        <div class="comment-box">
                            <ul>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="javascript:void(0);">
                                                <img src="assets/images/avatars/face2.jpg" alt="User Avatar" />
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="username">John Doe</div>
                                            <div class="comment">Lorem ipsum dolor sit amet, vel fugit abhorreant ei.</div>
                                            <div class="time">2 mins ago</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="javascript:void(0);">
                                                <img src="assets/images/avatars/face6.jpg" alt="User Avatar" />
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="username">Maria Doe</div>
                                            <div class="comment">Lorem ipsum dolor sit amet, vel fugit abhorreant ei...</div>
                                            <div class="time">30 mins ago</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="javascript:void(0);">
                                                <img src="assets/images/avatars/face3.jpg" alt="User Avatar" />
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="username">Everett Hunt</div>
                                            <div class="comment">Vel ex audiam virtute mediocritatem, quo.</div>
                                            <div class="time">1 hour ago</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="javascript:void(0);">
                                                <img src="assets/images/avatars/face7.jpg" alt="User Avatar" />
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="username">Connie Craig</div>
                                            <div class="comment">Duo enim harum moderatius et, sed ex oblique persius labor...</div>
                                            <div class="time">2 hours ago</div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="javascript:void(0);">
                                                <img src="assets/images/avatars/face5.jpg" alt="User Avatar" />
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="username">Bran Craig</div>
                                            <div class="comment">Eam te rebum legere urbanitas. Et vitae verear...</div>
                                            <div class="time">2 hours ago</div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Last 5 Comments -->
            <!-- To-Do List -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">TODO LIST</div>
                    <div class="panel-body">
                        <div class="input-group m-b-15">
                            <input type="text" placeholder="Please add to-do item..." class="input input-sm form-control js-input">
                            <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-default js-btn-add-item"> <i class="fa fa-plus m-r-5"></i>Add item</button>
                                    </span>
                        </div>
                        <ul class="todo-list">
                            <li class="closed">
                                <a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
                                <input type="checkbox" checked="checked" />
                                <span>Lorem ipsum dolor sit amet, mel id minimum maluisset.</span>
                                <span class="controls pull-right">
                                            <a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
                                        </span>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
                                <input type="checkbox" />
                                <span>Nec graeci essent luptatum cu, te mei sale essent impedit.</span>
                                <span class="controls pull-right">
                                            <a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
                                        </span>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
                                <input type="checkbox" />
                                <span>Mel ex graecis accusam atomorum. In vitae decore maiorum est.</span>
                                <span class="controls pull-right">
                                            <a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
                                        </span>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
                                <input type="checkbox" />
                                <span>Duo an suscipit scriptorem, ne nec melius periculis definiebas.</span>
                                <span class="controls pull-right">
                                            <a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
                                        </span>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
                                <input type="checkbox" />
                                <span>Has dictas constituto disputando an.</span>
                                <span class="controls pull-right">
                                            <a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
                                        </span>
                            </li>
                            <li>
                                <a href="javascript:void(0);" title="Move"><i class="fa fa-arrows move-handle"></i></a>
                                <input type="checkbox" />
                                <span>At errem altera assueverit sed, qui laoreet delectus incorrupte cu.</span>
                                <span class="controls pull-right">
                                            <a href="javascript:void(0);" title="Edit"><i class="fa fa-pencil"></i></a>
                                            <a href="javascript:void(0);" title="Delete"><i class="fa fa-trash js-delete-todo"></i></a>
                                        </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #END# To-Do List -->
        </div>
        <!-- Task List -->
        <div class="panel panel-default">
            <div class="panel-heading">TASK LIST</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table js-exportable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Assigned To</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>% Complete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Lorem ipsum dolor sit amet, in vis possit oportere</td>
                            <td>Larry Kitkat</td>
                            <td><i class="fa fa-circle m-r-5 col-success"></i>Normal</td>
                            <td>In Progress...</td>
                            <td>2016-12-04</td>
                            <td>2016-12-21</td>
                            <td><span class="pie">72/100</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Elitr veniam pro ei, et mea natum aliquando</td>
                            <td>Larry Otto</td>
                            <td><i class="fa fa-circle m-r-5 col-danger"></i>High</td>
                            <td><label class="label label-success">Completed</label></td>
                            <td>2016-11-01</td>
                            <td>2016-11-10</td>
                            <td><span class="pie">100/100</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pro et graeco mentitum, vis ea congue suavitate laboramus</td>
                            <td>John Doe</td>
                            <td><i class="fa fa-circle m-r-5 col-danger"></i>High</td>
                            <td>
                                <label class="label label-warning">Not Started</label>
                            </td>
                            <td>2016-12-05</td>
                            <td>2016-12-20</td>
                            <td><span class="pie">0/100</span></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ad pri vide mucius salutatus</td>
                            <td>John Doe</td>
                            <td><i class="fa fa-circle m-r-5 col-danger"></i>High</td>
                            <td>
                                <label class="label label-danger">Canceled</label>
                            </td>
                            <td>2016-12-01</td>
                            <td>2016-12-03</td>
                            <td><span class="pie">76/100</span></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Sea nemore ancillae accommodare ut</td>
                            <td>John Doe</td>
                            <td><i class="fa fa-circle m-r-5 col-danger"></i>High</td>
                            <td>In Progress...</td>
                            <td>2016-12-01</td>
                            <td>2016-12-03</td>
                            <td><span class="pie">65/100</span></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Salutatus concludaturque ea quo</td>
                            <td>John Doe</td>
                            <td><i class="fa fa-circle m-r-5 col-danger"></i>High</td>
                            <td>In Progress...</td>
                            <td>2016-12-01</td>
                            <td>2016-12-03</td>
                            <td><span class="pie">60/100</span></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Vel nusquam tibique assentior in</td>
                            <td>John Doe</td>
                            <td><i class="fa fa-circle m-r-5 col-danger"></i>High</td>
                            <td>In Progress...</td>
                            <td>2016-12-01</td>
                            <td>2016-12-03</td>
                            <td><span class="pie">52/100</span></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Ad legimus civibus invenire per</td>
                            <td>John Doe</td>
                            <td><i class="fa fa-circle m-r-5 col-success"></i>Normal</td>
                            <td><label class="label label-success">Completed</label></td>
                            <td>2016-12-01</td>
                            <td>2016-12-03</td>
                            <td><span class="pie">100/100</span></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Soleat dolorum splendide mei ut</td>
                            <td>John Doe</td>
                            <td><i class="fa fa-circle m-r-5 col-success"></i>Normal</td>
                            <td><label class="label label-success">Completed</label></td>
                            <td>2016-12-01</td>
                            <td>2016-12-03</td>
                            <td><span class="pie">100/100</span></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Duo natum prima atqui cu</td>
                            <td>John Doe</td>
                            <td><i class="fa fa-circle m-r-5 col-success"></i>Normal</td>
                            <td><label class="label label-success">Completed</label></td>
                            <td>2016-12-01</td>
                            <td>2016-12-03</td>
                            <td><span class="pie">100/100</span></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Ei usu augue epicuri delicata</td>
                            <td>John Doe</td>
                            <td><i class="fa fa-circle m-r-5 col-success"></i>Normal</td>
                            <td><label class="label label-success">Completed</label></td>
                            <td>2016-12-01</td>
                            <td>2016-12-03</td>
                            <td><span class="pie">100/100</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- #END# Task List -->
    </div>
@endsection
