@extends('layouts.master')
@section('judul', 'Dashboard')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="">
            <div class="menu-toggle ti-menu" id="menu-toggle"></div>
            <div class="page-title">
                <h1>Dashboard</h1>
                <p>Welcome back, {{$user->name}}!</p>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="card-grid">
            <div class="card">
                <div class="card-header">
                    <div>
                        <p class="card-title">Blogs</p>
                        <h3 class="card-value">1,254</h3>
                    </div>
                    <div class="card-icon users">
                        <i class="ti-user"></i>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <p class="card-title">Services</p>
                        <h3 class="card-value">24</h3>
                    </div>
                    <div class="card-icon services">
                        <i class="ti-package"></i>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <p class="card-title">Projects</p>
                        <h3 class="card-value">56</h3>
                    </div>
                    <div class="card-icon projects">
                        <i class="ti-briefcase"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection