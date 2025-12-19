<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

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
        $role = Role::create(['name' => 'SuperAdmin']);
        $role->givePermissionTo($permissionsNames);

        $role = Role::create(['name' => 'User']);
        $role->givePermissionTo([
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
        ]);
    }
}
