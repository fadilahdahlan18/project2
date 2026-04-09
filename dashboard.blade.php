@extends('layouts.app')
@section('title', 'Dashboard Murid')
@section('page-title', 'Dashboard Murid')

@section('content')
<div class="page-header">
    <h2><i class="fa-solid fa-gauge-high"></i> Dashboard Murid</h2>
    <div class="breadcrumb"><span>Halo, {{ auth()->user()->nama }} 👋</span></div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon success"><i class="fa-solid fa-circle-check"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $totalHadir }}</div>
            <div class="stat-label">Total Hadir</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon danger"><i class="fa-solid fa-circle-xmark"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $totalAlpha }}</div>
            <div class="stat-label">Total Alpha</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon burgundy"><i class="fa-solid fa-money-bill"></i></div>
        <div class="stat-info">
            <div class="stat-num">Rp {{ number_format($totalBayar, 0, ',', '.') }}</div>
            <div class="stat-label">Total Terbayar</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon warning"><i class="fa-solid fa-clock"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $pendingBayar }}</div>
            <div class="stat-label">Pembayaran Pending</div>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
    <!-- Jadwal -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fa-solid fa-calendar-days"></i> Jadwal Latihan</h3>
            <a href="{{ route('murid.jadwal') }}" class="btn btn-sm btn-secondary">Lihat Semua</a>
        </div>
        <div class="card-body" style="padding:0;">
            @if($jadwal->isEmpty())
                <div style="padding:24px;text-align:center;color:#adb5bd;font-size:13px;">Belum ada jadwal.</div>
            @else
            @foreach($jadwal->take(4) as $j)
            <div style="padding:12px 16px;border-bottom:1px solid #f1f3f5;display:flex;align-items:center;gap:12px;">
                <div style="width:44px;height:44px;background:#f9e8ec;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="fa-solid fa-music" style="color:#800020;"></i>
                </div>
                <div>
                    <div style="font-weight:600;font-size:13.5px;">{{ $j->nama_kelas }}</div>
                    <div style="font-size:12px;color:#6c757d;">
                        {{ $j->hari }} · {{ $j->jam }} WIB
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>

    <!-- Absensi Terbaru -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fa-solid fa-clipboard-list"></i> Absensi Terakhir</h3>
            <a href="{{ route('murid.absensi') }}" class="btn btn-sm btn-secondary">Lihat Semua</a>
        </div>
        <div class="card-body" style="padding:0;">
            @if($recentAbsensi->isEmpty())
                <div style="padding:24px;text-align:center;color:#adb5bd;font-size:13px;">Belum ada data absensi.</div>
            @else
            @foreach($recentAbsensi as $a)
            <div style="padding:12px 16px;border-bottom:1px solid #f1f3f5;display:flex;align-items:center;justify-content:space-between;">
                <div>
                    <div style="font-weight:600;font-size:13px;">{{ $a->jadwal->nama_kelas ?? '-' }}</div>
                    <div style="font-size:11px;color:#6c757d;">{{ \Carbon\Carbon::parse($a->tanggal)->format('d M Y') }}</div>
                </div>
                @if($a->status === 'hadir')
                    <span class="badge badge-success">Hadir</span>
                @elseif($a->status === 'izin')
                    <span class="badge badge-warning">Izin</span>
                @else
                    <span class="badge badge-danger">Alpha</span>
                @endif
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

<!-- Materi Terbaru -->
<div class="card" style="margin-top:20px;">
    <div class="card-header">
        <h3><i class="fa-solid fa-book-open"></i> Materi Terbaru</h3>
        <a href="{{ route('murid.materi') }}" class="btn btn-sm btn-secondary">Lihat Semua</a>
    </div>
    <div class="card-body" style="padding:0;">
        @if($recentMateri->isEmpty())
            <div style="padding:24px;text-align:center;color:#adb5bd;font-size:13px;">Belum ada materi.</div>
        @else
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:0;">
            @foreach($recentMateri as $m)
            <div style="padding:16px;border-bottom:1px solid #f1f3f5;border-right:1px solid #f1f3f5;">
                <div style="display:flex;align-items:flex-start;gap:12px;">
                    <div style="width:40px;height:40px;background:#f9e8ec;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fa-solid fa-file-pdf" style="color:#800020;"></i>
                    </div>
                    <div style="min-width:0;flex:1;">
                        <div style="font-weight:600;font-size:13px;margin-bottom:6px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                            {{ $m->judul }}
                        </div>
                        <div style="display:flex;gap:6px;flex-wrap:wrap;">
                            @if($m->file_pdf)
                                <a href="{{ asset('storage/'.$m->file_pdf) }}" target="_blank" class="btn btn-sm btn-danger" style="font-size:11px;">
                                    <i class="fa-solid fa-download"></i> PDF
                                </a>
                            @endif
                            @if($m->link_video)
                                <a href="{{ $m->link_video }}" target="_blank" class="btn btn-sm btn-secondary" style="font-size:11px;">
                                    <i class="fa-brands fa-youtube"></i> Video
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

<!-- Quick Payment -->
<div class="card" style="margin-top:20px;">
    <div class="card-header"><h3><i class="fa-solid fa-money-bill-wave"></i> Pembayaran Iuran</h3></div>
    <div class="card-body" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;">
        <div style="font-size:14px;color:#6c757d;">
            Bayar iuran latihan per pertemuan dan pantau status pembayaran Anda.
        </div>
        <div style="display:flex;gap:10px;">
            <a href="{{ route('murid.pembayaran.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i> Bayar Sekarang
            </a>
            <a href="{{ route('murid.pembayaran') }}" class="btn btn-secondary">
                <i class="fa-solid fa-history"></i> Riwayat
            </a>
        </div>
    </div>
</div>
@endsection
