@extends('layouts.app')

@section('title', 'Países'.' | '.config('app.name'))

@section('style')
<link href="{{ asset('assets/css/pages/inbox/inbox.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Dashboard </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                Países </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
    </div>
</div>
<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

	<!--Begin::Inbox-->
	<div class="kt-grid kt-grid--desktop kt-grid--ver-desktop  kt-inbox" id="kt_inbox">

		<!--Begin::Aside Mobile Toggle-->
		<button class="kt-inbox__aside-close" id="kt_inbox_aside_close">
			<i class="la la-close"></i>
		</button>

		<!--End:: Aside Mobile Toggle-->

		<!--Begin:: Inbox Aside-->
		<div class="kt-grid__item   kt-portlet  kt-inbox__aside" id="kt_inbox_aside">
			<a href="{{ url ('mensajes/create')}}" class="btn btn-brand  btn-upper btn-bold">Redactar</a>
			<div class="kt-inbox__nav">
                <ul class="kt-nav">
                    <li class="kt-nav__item kt-nav__item--active">
                        <a href="{{ url ('mensajes')}}" class="kt-nav__link" data-action="list" data-type="inbox">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-nav__link-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M13.8,4 C13.1562,4 12.4033,4.72985286 12,5.2 C11.5967,4.72985286 10.8438,4 10.2,4 C9.0604,4 8.4,4.88887193 8.4,6.02016349 C8.4,7.27338783 9.6,8.6 12,10 C14.4,8.6 15.6,7.3 15.6,6.1 C15.6,4.96870845 14.9396,4 13.8,4 Z" fill="#000000" opacity="0.3" />
                                    <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />
                                </g>
                            </svg> <span class="kt-nav__link-text">Recibidos</span>
                            <span class="kt-nav__link-badge">
                                <span class="kt-badge kt-badge--unified-success kt-badge--md kt-badge--rounded kt-badge--boldest">{{ $sin_leer }}</span>
                            </span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="{{ url('/mensajes/importantes')}}" class="kt-nav__link" data-action="list" data-type="marked">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-nav__link-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M12,4.25932872 C12.1488635,4.25921584 12.3000368,4.29247316 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 L12,4.25932872 Z" fill="#000000" opacity="0.3" />
                                    <path d="M12,4.25932872 L12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.277344,4.464261 11.6315987,4.25960807 12,4.25932872 Z" fill="#000000" />
                                </g>
                            </svg> <span class="kt-nav__link-text">Importantes</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="#" class="kt-nav__link" data-action="list" data-type="draft">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-nav__link-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
                                    <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
                                </g>
                            </svg> <span class="kt-nav__link-text">Borradores</span>
                            <span class="kt-nav__link-badge">
                                <span class="kt-badge kt-badge--unified-warning kt-badge--md kt-badge--rounded kt-badge--boldest">1</span>
                            </span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="#" class="kt-nav__link" data-action="list" data-type="sent">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-nav__link-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M8,13.1668961 L20.4470385,11.9999863 L8,10.8330764 L8,5.77181995 C8,5.70108058 8.01501031,5.63114635 8.04403925,5.56663761 C8.15735832,5.31481744 8.45336217,5.20254012 8.70518234,5.31585919 L22.545552,11.5440255 C22.6569791,11.5941677 22.7461882,11.6833768 22.7963304,11.794804 C22.9096495,12.0466241 22.7973722,12.342628 22.545552,12.455947 L8.70518234,18.6841134 C8.64067359,18.7131423 8.57073936,18.7281526 8.5,18.7281526 C8.22385763,18.7281526 8,18.504295 8,18.2281526 L8,13.1668961 Z" fill="#000000" />
                                    <path d="M4,16 L5,16 C5.55228475,16 6,16.4477153 6,17 C6,17.5522847 5.55228475,18 5,18 L4,18 C3.44771525,18 3,17.5522847 3,17 C3,16.4477153 3.44771525,16 4,16 Z M1,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L1,13 C0.44771525,13 6.76353751e-17,12.5522847 0,12 C-6.76353751e-17,11.4477153 0.44771525,11 1,11 Z M4,6 L5,6 C5.55228475,6 6,6.44771525 6,7 C6,7.55228475 5.55228475,8 5,8 L4,8 C3.44771525,8 3,7.55228475 3,7 C3,6.44771525 3.44771525,6 4,6 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg> <span class="kt-nav__link-text">Enviados</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="{{ url('/mensajes/eliminados')}}" class="kt-nav__link" data-action="list" data-type="trash">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-nav__link-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                    <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg> <span class="kt-nav__link-text">Eliminados</span>
                        </a>
                    </li>
                </ul>
            </div>
		</div>

		<!--End::Aside-->


		<!--Begin:: Inbox View-->
		<div class="kt-grid__item kt-grid__item--fluid    kt-portlet    kt-inbox__view kt-inbox__view--shown" id="kt_inbox_view">
			<div class="kt-portlet__head">
				<div class="kt-inbox__toolbar">
					<div class="kt-inbox__actions">
						<a href="#" class="kt-inbox__icon kt-inbox__icon--back">
							<i class="flaticon2-left-arrow-1"></i>
						</a>						
						<a href="{{ url('/mensajes/'.$data[0]->id.'/delete')}}" class="kt-inbox__icon" data-toggle="kt-tooltip" title="Delete">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
									<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
								</g>
							</svg> </a>						
					</div>
					<div class="kt-inbox__controls">
						<span class="kt-inbox__pages" data-toggle="kt-tooltip" title="Records per page">
							<span class="kt-inbox__perpage" data-toggle="dropdown">3 of 230 pages</span>
						</span>
						<button class="kt-inbox__icon" data-toggle="kt-tooltip" title="Previose message">
							<i class="flaticon2-left-arrow"></i>
						</button>
						<button class="kt-inbox__icon" data-toggle="kt-tooltip" title="Next message">
							<i class="flaticon2-right-arrow"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body kt-portlet__body--fit-x">
				<div class="kt-inbox__subject">
					<div class="kt-inbox__title">
						<h3 class="kt-inbox__text">{{ $data[0]->asunto}}</h3>
						<span class="kt-inbox__label kt-badge kt-badge--unified-brand kt-badge--bold kt-badge--inline">
							inbox
						</span>
						<span class="kt-inbox__label kt-badge kt-badge--unified-danger kt-badge--bold kt-badge--inline">
							important
						</span>
					</div>
					<div class="kt-inbox__actions">
						<a href="#" class="kt-inbox__icon">
							<i class="flaticon2-sort"></i>
						</a>
						<a href="#" class="kt-inbox__icon">
							<i class="flaticon2-fax"></i>
						</a>
					</div>
				</div>
				<div class="kt-inbox__messages">
					<div class="kt-inbox__message kt-inbox__message--expanded">
						<div class="kt-inbox__head">
							<span class="kt-media" data-toggle="expand" style="background-image: url('assets/media/users/100_13.jpg')">
								<span></span>
							</span>
							<div class="kt-inbox__info">
								<div class="kt-inbox__author" data-toggle="expand">
									<a href="#" class="kt-inbox__name">Chris Muller</a>
									<div class="kt-inbox__status">
										<span class="kt-badge kt-badge--success kt-badge--dot"></span> 1 Day ago
									</div>
								</div>
								<div class="kt-inbox__details">
									<div class="kt-inbox__tome">
										<span class="kt-inbox__label" data-toggle="dropdown">
											to me <i class="flaticon2-down"></i>
										</span>
										<div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-left">
											<table class="kt-inbox__details">
												<tr>
													<td>from</td>
													<td>Mark Andre</td>
												</tr>
												<tr>
													<td>date:</td>
													<td>Jul 30, 2019, 11:27 PM</td>
												</tr>
												<tr>
													<td>from:</td>
													<td>Mark Andre</td>
												</tr>
												<tr>
													<td>subject:</td>
													<td>Trip Reminder. Thank you for flying with us!</td>
												</tr>
												<tr>
													<td>reply to:</td>
													<td>mark.andre@gmail.com</td>
												</tr>
											</table>
										</div>
									</div>
									<div class="kt-inbox__desc" data-toggle="expand">
										With resrpect, i must disagree with Mr.Zinsser. We all know the most part of important part....
									</div>
								</div>
							</div>
							<div class="kt-inbox__actions">
								<div class="kt-inbox__datetime" data-toggle="expand">
									Jul 15, 2019, 11:19AM
								</div>
								<div class="kt-inbox__group">
									<span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Star">
										<i class="flaticon-star"></i>
									</span>
									<span class="kt-inbox__icon kt-inbox__icon--label kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Mark as important">
										<i class="flaticon-add-label-button"></i>
									</span>
									<span class="kt-inbox__icon kt-inbox__icon--reply kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Reply">
										<i class="flaticon2-reply-1"></i>
									</span>
									<span class="kt-inbox__icon kt-inbox__icon--light" data-toggle="kt-tooltip" data-placement="top" title="Settings">
										<i class="flaticon-more"></i>
									</span>
								</div>
							</div>
						</div>
						<div class="kt-inbox__body">
							<div class="kt-inbox__text">
								{!! $data[0]->mensaje !!}
							</div>
						</div>
					</div>
				</div>
				<div class="kt-inbox__reply kt-inbox__reply--on">
					<div class="kt-inbox__actions">
						<button class="btn btn-secondary btn-bold">
							<i class="flaticon2-reply-1 kt-font-brand"></i> Reply
						</button>
						<button class="btn btn-secondary btn-bold">
							<i class="flaticon2-left-arrow-1 kt-font-brand"></i> Forward
						</button>
					</div>
				</div>
			</div>
		</div>

		<!--End:: Inbox View-->
	</div>

	<!--End::Inbox-->

</div>

<!-- end:: Content -->
                        


@endsection

   
@section('scripts')

<script src="{{ asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>

<!-- Page-Level Scripts -->
<script>
$(document).ready(function(){
    $('.dataTables-example').DataTable({
        "order": [[ 2, "asc" ]], //or asc 
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            //{ extend: 'copy'},
            //{extend: 'csv'},
            //{extend: 'excel', title: 'ExampleFile'},
            //{extend: 'pdf', title: 'ExampleFile'},

            /*{extend: 'print',
             customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
            }
            }*/
        ],
        "language":{
            "info": "_TOTAL_ registros",
            "search": "Buscar",
            "paginate":{
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "lengthMenu": 'Mostrar <select>'+
                        '<option value="10">10</option>'+
                        '<option value="30">30</option>'+
                        '<option value="-1">Todos</option>'+
                        '</select> registros | ',
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "emptyTable": "No hay datos",
            "infoEmpty": "",
            "infoFiltered": ""
        }

    });

});

</script>
@endsection
