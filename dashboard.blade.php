@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')
<div class="page-header">
    <h2><i class="fa-solid fa-gauge-high"></i> Dashboard Administrator</h2>
    <div class="breadcrumb"><span>Beranda</span></div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon burgundy"><i class="fa-solid fa-user-graduate"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $totalMurid }}</div>
            <div class="stat-label">Total Murid</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon gold"><i class="fa-solid fa-chalkboard-user"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $totalPelatih }}</div>
            <div class="stat-label">Total Pelatih</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon success"><i class="fa-solid fa-calendar-days"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $totalJadwal }}</div>
            <div class="stat-label">Jadwal Aktif</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon info"><i class="fa-solid fa-book-open"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $totalMateri }}</div>
            <div class="stat-label">Total Materi</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon warning"><i class="fa-solid fa-clock"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $pendingBayar }}</div>
            <div class="stat-label">Pembayaran Menunggu</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon danger"><i class="fa-solid fa-clipboard-check"></i></div>
        <div class="stat-info">
            <div class="stat-num">{{ $totalAbsensi }}</div>
            <div class="stat-label">Total Absensi</div>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
    <!-- Recent Pembayaran -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fa-solid fa-money-bill-wave"></i> Pembayaran Terbaru</h3>
            <a href="{{ route('admin.pembayaran') }}" class="btn btn-sm btn-secondary">Lihat Semua</a>
        </div>
        <div class="card-body" style="padding:0;">
            @if($recentPembayaran->isEmpty())
                <div style="padding:24px;text-align:center;color:#adb5bd;font-size:13px;">
                    <i class="fa-solid fa-inbox" style="font-size:28px;margin-bottom:8px;display:block;"></i>
                    Belum ada data pembayaran
                </div>
            @else
            <div class="table-responsive">
                <table class="steva-table">
                    <thead><tr><th>Murid</th><th>Jumlah</th><th>Status</th></tr></thead>
                    <tbody>
                    @foreach($recentPembayaran as $p)
                    <tr>
                        <td>{{ $p->user->nama ?? '-' }}</td>
                        <td>Rp {{ number_format($p->jumlah, 0, ',', '.') }}</td>
                        <td>
                            @if($p->status === 'disetujui')
                                <span class="badge badge-success">Disetujui</span>
                            @elseif($p->status === 'ditolak')
                                <span class="badge badge-danger">Ditolak</span>
                            @else
                                <span class="badge badge-warning">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

    <!-- Recent Absensi -->
    <div class="card">
        <div class="card-header">
            <h3><i class="fa-solid fa-clipboard-check"></i> Absensi Terbaru</h3>
            <a href="{{ route('admin.absensi') }}" class="btn btn-sm btn-secondary">Lihat Semua</a>
        </div>
        <div class="card-body" style="padding:0;">
            @if($recentAbsensi->isEmpty())
                <div style="padding:24px;text-align:center;color:#adb5bd;font-size:13px;">
                    <i class="fa-solid fa-inbox" style="font-size:28px;margin-bottom:8px;display:block;"></i>
                    Belum ada data absensi
                </div>
            @else
            <div class="table-responsive">
                <table class="steva-table">
                    <thead><tr><th>Murid</th><th>Kelas</th><th>Tanggal</th><th>Status</th></tr></thead>
                    <tbody>
                    @foreach($recentAbsensi as $a)
                    <tr>
                        <td>{{ $a->user->nama ?? '-' }}</td>
                        <td>{{ $a->jadwal->nama_kelas ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($a->tanggal)->format('d/m/Y') }}</td>
                        <td>
                            @if($a->status === 'hadir')
                                <span class="badge badge-success">Hadir</span>
                            @elseif($a->status === 'izin')
                                <span class="badge badge-warning">Izin</span>
                            @else
                                <span class="badge badge-danger">Alpha</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="card" style="margin-top:20px;">
    <div class="card-header"><h3><i class="fa-solid fa-bolt"></i> Aksi Cepat</h3></div>
    <div class="card-body" style="display:flex;flex-wrap:wrap;gap:12px;">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Tambah Pengguna</a>
        <a href="{{ route('admin.jadwal.create') }}" class="btn btn-gold"><i class="fa-solid fa-calendar-plus"></i> Tambah Jadwal</a>
        <a href="{{ route('admin.absensi.create') }}" class="btn btn-success"><i class="fa-solid fa-clipboard-list"></i> Input Absensi</a>
        <a href="{{ route('admin.laporan.absensi') }}" class="btn btn-secondary"><i class="fa-solid fa-chart-bar"></i> Rekap Absensi</a>
        <a href="{{ route('admin.laporan.pembayaran') }}" class="btn btn-secondary"><i class="fa-solid fa-file-invoice-dollar"></i> Rekap Pembayaran</a>
    </div>
</div>
@endsection
