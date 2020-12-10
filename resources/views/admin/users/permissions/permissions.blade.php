<table class="table table-bordered">
    <thead>
        <tr>
            <th style="width: 300px;"></th>
            <th class="text-center">VER</th>
            <th class="text-center">CREAR</th>
            <th class="text-center">EDITAR</th>
            <th class="text-center">ELIMINAR</th>
            <th class="text-center">TODO</th>
        </tr>
    </thead>
    <tbody>
        @foreach($permissions as $module => $permissions)

            <tr>
                <td>{{ strtoupper($module) }}</td>

                @foreach($permissions as $subPermissionTitle => $permissionsActions)
                    <td class="text-center">
                        @if(count($user->permissions) == 0)
                            <label>
                                <input id="<?php echo "$module.$permissionsActions" ?>" name="permissions[<?php echo "$module.$permissionsActions" ?>]" type="checkbox" class="flat-blue acciones" <?php echo array_get($user->roles()->first()->permissions, "$module.$permissionsActions", false) === true ? 'checked' : '' ?> value="true"/>
                            </label>
                        @else
                            <label>
                                <input id="<?php echo "$module.$permissionsActions" ?>" name="permissions[<?php echo "$module.$permissionsActions" ?>]" type="checkbox" class="flat-blue acciones" <?php echo array_get($user->permissions, "$module.$permissionsActions", false) === true ? 'checked' : '' ?> value="true"/>
                            </label>
                        @endif
                        
                    </td>
                @endforeach

                <td class="text-center"><input type="checkbox" name="" onclick="desbloquear()" class="flat-blue <?php echo "$module"?> modulos"></td>

            </tr>

        @endforeach
    </tbody>
</table>