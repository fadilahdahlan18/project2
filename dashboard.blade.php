@extends('layouts.app')
@section('title', 'Dashboard Pelatih')
@section('page-title', 'Dashboard Pelatih')

@section('content')
<div class="page-header">
    <h2><i class="fa-solid fa-gauge-high"></i> Dashboard Pelatih</h2>
    <div class="breadcrumb"><span>Selamat datang, {{ auth()->user()->nama }}</span></div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon burgundy"><i class="fa-solid fa-book-open"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $totalMateri }}</div>
            <div class="stat-label">Materi Diunggah</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon gold"><i class="fa-solid fa-calendar-days"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $totalJadwal }}</div>
            <div class="stat-label">Total Jadwal</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon success"><i class="fa-solid fa-user-graduate"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $totalMurid }}</div>
            <div class="stat-label">Total Murid</div>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
    <!-- Jadwal -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fa-solid fa-calendar-days"></i> Jadwal Latihan</h3>
        </div>
        <div class="card-body" style="padding:0;">
            @if($jadwal->isEmpty())
                <div style="padding:24px;text-align:center;color:#adb5bd;font-size:13px;">Belum ada jadwal.</div>
            @else
            @foreach($jadwal as $j)
            <div style="padding:12px 16px;border-bottom:1px solid #f1f3f5;display:flex;align-items:center;gap:12px;">
                <div style="width:44px;height:44px;background:#f9e8ec;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="fa-solid fa-music" style="color:#800020;"></i>
                </div>
                <div>
                    <div style="font-weight:600;font-size:13.5px;">{{ $j->nama_kelas }}</div>
                    <div style="font-size:12px;color:#6c757d;">
                        <i class="fa-solid fa-calendar-days"></i> {{ $j->hari }}
                        &nbsp;<i class="fa-regular fa-clock"></i> {{ $j->jam }} WIB
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>

    <!-- Recent Materi -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fa-solid fa-book-open"></i> Materi Terbaru</h3>
            <a href="{{ route('pelatih.materi.create') }}" class="btn btn-sm btn-gold">
                <i class="fa-solid fa-plus"></i> Upload
            </a>
        </div>
        <div class="card-body" style="padding:0;">
            @if($recentMateri->isEmpty())
                <div style="padding:24px;text-align:center;color:#adb5bd;font-size:13px;">Belum ada materi.</div>
            @else
            @foreach($recentMateri as $m)
            <div style="padding:12px 16px;border-bottom:1px solid #f1f3f5;display:flex;align-items:center;gap:12px;">
                <div style="width:44px;height:44px;background:#f9e8ec;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="fa-solid fa-file-pdf" style="color:#800020;"></i>
                </div>
                <div style="min-width:0;flex:1;">
                    <div style="font-weight:600;font-size:13.5px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $m->judul }}</div>
                    <div style="font-size:11px;color:#6c757d;">{{ $m->created_at->diffForHumans() }}</div>
                </div>
                <a href="{{ route('pelatih.materi.edit', $m->id) }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-pen"></i>
                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

<div style="margin-top:20px;">
    <div class="card">
        <div class="card-header"><h3><i class="fa-solid fa-bolt"></i> Aksi Cepat</h3></div>
        <div class="card-body" style="display:flex;flex-wrap:wrap;gap:12px;">
            <a href="{{ route('pelatih.absensi.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-clipboard-list"></i> Input Absensi
            </a>
            <a href="{{ route('pelatih.materi.create') }}" class="btn btn-gold">
                <i class="fa-solid fa-upload"></i> Upload Materi
            </a>
            <a href="{{ route('pelatih.absensi') }}" class="btn btn-secondary">
                <i class="fa-solid fa-clipboard-check"></i> Lihat Absensi
            </a>
        </div>
    </div>
</div>
@endsection
