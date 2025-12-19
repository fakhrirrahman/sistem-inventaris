<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsNames = [
            'ViewAny:Role',
            'View:Role',
            'Create:Role',
            'Update:Role',
            'Delete:Role',
            'Restore:Role',
            'ForceDelete:Role',
            'ForceDeleteAny:Role',
            'RestoreAny:Role',
            'Replicate:Role',
            'Reorder:Role',

            'ViewAny:Barang',
            'View:Barang',
            'Create:Barang',
            'Update:Barang',
            'Delete:Barang',
            'Restore:Barang',
            'ForceDelete:Barang',
            'ForceDeleteAny:Barang',
            'RestoreAny:Barang',
            'Replicate:Barang',
            'Reorder:Barang',

            'ViewAny:Customer',
            'View:Customer',
            'Create:Customer',
            'Update:Customer',
            'Delete:Customer',
            'Restore:Customer',
            'ForceDelete:Customer',
            'ForceDeleteAny:Customer',
            'RestoreAny:Customer',
            'Replicate:Customer',
            'Reorder:Customer',

            'ViewAny:Peminjaman',
            'View:Peminjaman',
            'Create:Peminjaman',
            'Update:Peminjaman',
            'Delete:Peminjaman',
            'Restore:Peminjaman',
            'ForceDelete:Peminjaman',
            'ForceDeleteAny:Peminjaman',
            'RestoreAny:Peminjaman',
            'Replicate:Peminjaman',
            'Reorder:Peminjaman',

            'View:Dashboard',
            'View:Login',
            'View:Register',
            'View:BarangChartWidget',
            'View:BarangSeringDipinjamWidget',
            'View:LogPeminjamanWidget',
            'View:OverviewStats',
            'View:PeminjamanChartWidget',
        ];

        foreach ($permissionsNames as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
        Role::create(['name' => 'SuperAdmin'])->givePermissionTo($permissionsNames);
        User::where
    }
}
