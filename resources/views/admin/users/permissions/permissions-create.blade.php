@foreach($permissions as $key => $permission)
    <div class="col-md-12">
        <div class="page-header">
            <h4>{{ strtoupper($key) }}</h4>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 400px;"> MODULOS </th>
                <th class="text-center"> VER </th>
                <th class="text-center"> CREAR </th>
                <th class="text-center"> EDITAR </th>
                <th class="text-center"> ELIMINAR </th>
            </tr>
            </thead>

            @foreach($permission as $subPermissionTitle => $permissionModules)
                <tbody>
                <tr>
                    <td> {{ $subPermissionTitle }} </td>
                    @foreach($permissionModules as $permissionsActions)

                        @if(count($permissionModules) != 4)
                            <td class="text-center">
                                <label>
                                    <input name="permissions[<?php echo "$subPermissionTitle.$permissionsActions" ?>]" type="hidden" value="false"/>
                                    <input id="<?php echo "$subPermissionTitle.$permissionsActions" ?>" name="permissions[<?php echo "$subPermissionTitle.$permissionsActions" ?>]" type="checkbox" class="flat-blue" <?php echo array_get(null, "$subPermissionTitle.$permissionsActions", false) === true ? 'checked' : '' ?> value="true"/>
                                </label>
                            </td>
                            <td colspan="3"></td>
                        @else
                            <td class="text-center">
                                <label>
                                    <input name="permissions[<?php echo "$subPermissionTitle.$permissionsActions" ?>]" type="hidden" value="false"/>
                                    <input id="<?php echo "$subPermissionTitle.$permissionsActions" ?>" name="permissions[<?php echo "$subPermissionTitle.$permissionsActions" ?>]" type="checkbox" class="flat-blue" <?php echo array_get(null, "$subPermissionTitle.$permissionsActions", false) === true ? 'checked' : '' ?> value="true"/>
                                </label>
                            </td>
                        @endif
                    @endforeach
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endforeach