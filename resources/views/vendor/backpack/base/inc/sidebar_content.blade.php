{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('manufacturer') }}"><i class="nav-icon la la-th-list"></i> Manufacturers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('vmodel') }}"><i class="nav-icon la la-th-list"></i> Vmodels</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('vehicle') }}"><i class="nav-icon la la-th-list"></i> Vehicles</a></li>