
    <ul class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">INICIO</a></li>
        <li><a href="#assignments" data-toggle="tab">ASIGNACIONES EXTRAS</a></li>
        <li><a href="#deductions" data-toggle="tab">DEDUCCIONES EXTRAS</a></li>
        <li><a href="#payments" data-toggle="tab">SALARIOS</a></li>
        <li><a href="#cestaticket" data-toggle="tab">CESTATICKET</a></li>
    </ul>
    
    <br>
    {!! Form::hidden('prenomina', $prenomina->id) !!}

    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    	<tr>
                    		<th colspan="2"></th>
                    		<th colspan="6" class="text-center">ASIGNACIONES</th>
                    		<th colspan="5" class="text-center">DEDUCCIONES</th>
                    		<th></th>
                    	</tr>
                        <tr>
                            <th class="text-center">Nº DE CÉDULA DE EMPLEADOS</th>
                            <th class="text-center">NOMBRES DE EMPLEADOS</th>
                            <th class="text-center">TIEMPO ORDINAR.</th>
                            <th class="text-center">FERIADO O DESCANSO</th>
                            <th class="text-center">HORAS EXTRA</th>
                            <th class="text-center">TOTAL ASIG.</th>
                            <th>OTROS</th>
                            <th class="text-center">TOTAL A CANCELAR</th>
                            <th>SSO</th>
                            <th>RPE</th>
                            <th>RPVH</th>
                            <th>OTROS</th>
                            <th class="text-center">TOTAL DEDUCCIONES</th>
                            <th class="text-center">NETO A COBRAR</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($empleados as $key => $empleado)

                        	<tr class="text-center">
                            	<td class="text-left"> 
                            		{{ $empleado->dni_cedula }} 
                                    {!! Form::hidden('cedula[]', $empleado->dni_cedula) !!}
                            	</td>

                            	<td class="text-left">
                            		{{ $empleado->fullname }} 
                                    {!! Form::hidden('nombre_completo[]', $empleado->fullname) !!}
                            	</td>
                            	<td>
                            		{{ laborados($empleado->id, $assistances, $dates) }} 
                                    {{--*/ $diasLaborados[] = laborados($empleado->id, $assistances, $dates) /*--}} 
                                    {!! Form::hidden('diasLaborados[]', $diasLaborados[$key]) !!}
                            	</td>
                                <td>
                                    {{ feriadosDescanso($empleado->id, $assistances, $dates) }} 
                                    {{--*/ $feriadosDescanso[] = laborados($empleado->id, $assistances, $dates) /*--}} 
                                    {!! Form::hidden('feriadosDescanso[]', $feriadosDescanso[$key]) !!}
                                </td>
                            	<td>
                            		{{ horasExtras($empleado->id, $assistances) }} 
                                    {{--*/ $horasExtras[] = horasExtras($empleado->id, $assistances) /*--}} 
                                    {!! Form::hidden('horasExtas[]', $horasExtras[$key]) !!}
                            	</td>
                            	<td>
                                    {{ asignacion($empleado, $horasExtras[$key]) }}
                                    {{--*/ $totalAsignacion[] = asignacion($empleado, $horasExtras[$key]) /*--}} 
                                    {!! Form::hidden('totalAsignacion[]', $totalAsignacion[$key]) !!}
                            	</td>
                                <td>
                                    {{ asignacionesExtras($empleado, $prenomina->id) }} 
                                    {{--*/ $asignacionesExtras[] = asignacionesExtras($empleado, $prenomina->id) /*--}} 
                                    {!! Form::hidden('asignacionesExtras[]', $asignacionesExtras[$key]) !!}
                                </td>
                                <td>
                                    {{ number_format(totalCancelar($empleado, $totalAsignacion[$key], $diasLaborados[$key], $asignacionesExtras[$key], $feriadosDescanso[$key]), 2, '.', ',') }}
                                    {{--*/ $totalCancelar[] =  totalCancelar($empleado, $totalAsignacion[$key], $diasLaborados[$key], $asignacionesExtras[$key], $feriadosDescanso[$key]) /*--}} 
                                    {!! Form::hidden('totalCancelar[]', $totalCancelar[$key]) !!}
                                </td>
                            	<td>
                            		{{ sso($empleado,$deducciones->SSO,$i,$f) }} 
                                    {{--*/ $sso[] = sso($empleado,$deducciones->SSO,$i,$f) /*--}} 
                                    {!! Form::hidden('sso[]', $sso[$key]) !!}
                            	</td>
                            	<td>
                            		{{ rpe($empleado,$deducciones->RPE,$i,$f) }} 
                                    {{--*/ $rpe[] = rpe($empleado,$deducciones->RPE,$i,$f) /*--}} 
                                    {!! Form::hidden('rpe[]', $rpe[$key]) !!}
                            	</td>
                                <td>
                                    {{ rpvh($empleado, $deducciones->RPVH, $totalAsignacion[$key]) }} 
                                    {{--*/ $rpvh[] = rpvh($empleado, $deducciones->RPVH, $totalAsignacion[$key]) /*--}} 
                                    {!! Form::hidden('rpvh[]', $rpvh[$key]) !!}
                            	</td>
                                <td>
                                    {{ otrasDeducciones($empleado, $prenomina->id) }} 
                                    {{--*/ $deduccionesExtras[] = otrasDeducciones($empleado, $prenomina->id) /*--}} 
                                    {!! Form::hidden('deduccionesExtras[]', $deduccionesExtras[$key]) !!}
                                </td>
                            	<td>
                            	   {{ totalDeducciones($sso[$key], $rpe[$key], $rpvh[$key], $deduccionesExtras[$key]) }} 
                                   {{--*/ $totalDeducciones[] = totalDeducciones($sso[$key], $rpe[$key], $rpvh[$key], $deduccionesExtras[$key]) /*--}} {!! Form::hidden('totalDeducciones[]', $totalDeducciones[$key]) !!}
                            	</td>
                            	<td>
                            		{{ number_format(netoCobrar($totalCancelar[$key], $totalDeducciones[$key]), 2, '.', ',') }}
                                    {{--*/ $totalNeto[] = netoCobrar($totalCancelar[$key], $totalDeducciones[$key]) /*--}} 
                                    {!! Form::hidden('totalNeto[]', $totalNeto[$key]) !!}
                            	</td>
                        	</tr>
                        @endforeach
                        	<tr class="text-center">
                        		<td colspan="2" class="text-right">TOTAL </td>
                        		<td></td>
                                <td></td>
                                <td></td>
                                <td>{{ totalAsignacion($totalAsignacion) }}</td>
                                <td>{{ totalOtros($asignacionesExtras) }}</td>
                                <td>{{ totalCancelarEm($totalCancelar) }}</td>
                                <td>{{ totalSSO($sso) }}</td>
                                <td>{{ totalRPE($rpe) }}</td>
                                <td>{{ totalRPVH($rpvh) }}</td>
                                <td>{{ totalOtrasDeducciones($deduccionesExtras) }}</td>
                                <td>{{ totalDeduccionesExtras($totalDeducciones) }}</td>
                                <td>{{ totalNeto($totalNeto) }}</td>
                        	</tr>
                    </tbody>
                </table>
            </div>
        </div>
    <div class="tab-pane fade" id="assignments">
        <div class="table-responsive">

        <!-- ASIGNACIONES -->

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">
                            NOMBRES
                        </th>
                        @if(count($adicionales) > 0)
                            
                            @foreach($adicionales as $adicional)

                                @if(contarAsignaciones($adicionales) > 0)
                                    
                                    @if($adicional->tipo == 'A')
                                        
                                        <th class="text-center">{{ $adicional->nombre }}</th>

                                    @endif
                                @else

                                    <th class="text-center">NO HAY ASIGNACIONES ADICIONALES CREADAS PARA ESTA PRENÓMINA.</th>
                                <?php break; ?>
                                @endif

                            @endforeach

                        @else

                            <th class="text-center">NO HAY ASIGNACIONES ADICIONALES CREADAS PARA ESTA PRENÓMINA.</th>
                          
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado)
                        <tr>
                            <td style="width: 300px;">
                                {{ $empleado->full_name }}
                            </td>

                             @if(count($adicionales) > 0)

                                @foreach($adicionales as $key => $adicional)

                                    @if($adicional->tipo == 'A')

                                        @if(adicionalAsignada($adicional->id, $empleado->id, $prenomina->id))
                                            <td class="text-center">
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal2A" onclick="eliminarA({{$empleado->id}},{{ $adicional->id }}, {{ $prenomina->id }})"><i class="glyphicon glyphicon-minus"></i></a>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModalA" onclick="agregarA({{$empleado->id}},{{ $adicional->id }}, {{ $prenomina->id }})"><i class="glyphicon glyphicon-plus"></i></a>
                                            </td>
                                        
                                        @endif

                                    @else 
                                        <td></td>
                                        <?php break; ?>
                                    @endif

                                @endforeach
                            @else

                                <td></td>
                                
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="deductions">
        <div class="table-responsive">

        <!-- DEDUCCIONES -->

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">
                            NOMBRES
                        </th>
                        @if(count($adicionales) > 0)
                            
                            @foreach($adicionales as $adicional)

                                @if(contarDeducciones($adicionales) > 0)
                                    
                                    @if($adicional->tipo == 'D')
                                        
                                        <th class="text-center">{{ $adicional->nombre }}</th>

                                    @endif

                                @else

                                    <th class="text-center">NO HAY DEDUCCIONES ADICIONALES CREADAS PARA ESTA PRENÓMINA.</th>
                                    <?php break; ?>
                                @endif

                            @endforeach

                        @else

                            <th class="text-center">NO HAY DEDUCCIONES ADICIONALES CREADAS PARA ESTA PRENÓMINA.</th>
                          
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado)
                        <tr>
                            <td style="width: 300px;">
                                {{ $empleado->full_name }}
                            </td>
                            @if(count($adicionales) > 0)

                                @foreach($adicionales as $key => $adicional)

                                    @if($adicional->tipo == 'D')

                                        @if(adicionalAsignada($adicional->id, $empleado->id, $prenomina->id))
                                            <td class="text-center">
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal2" onclick="eliminarD({{$empleado->id}},{{ $adicional->id }}, {{ $prenomina->id }})"><i class="glyphicon glyphicon-minus"></i></a>
                                            </td>
                                        @else
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="agregarD({{$empleado->id}},{{ $adicional->id }}, {{ $prenomina->id }})"><i class="glyphicon glyphicon-plus"></i></a>
                                            </td>
                                        
                                        @endif
                                    @else 
                                        <td></td>
                                        <?php break; ?>
                                    @endif

                                @endforeach
                            @else

                                <td></td>

                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="payments">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>EMPLEADO</th>
                          <th>CARGO</th>
                          <th>SALARIO MENSUAL</th>
                          <th>SALARIO DIARIO</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($empleados as $key => $empleado)
                        <tr>
                            <td>{{ $empleado->full_name }}</td>
                            <td>
                                {{ $empleado->cargo->nombre }}
                                {!! Form::hidden('cargos[]', $empleado->cargo->nombre) !!}
                            </td>
                            <td>
                                {{ number_format($empleado->cargo->salario, 2, '.', ',') }} 
                                {!! Form::hidden('salarioMensual[]', $empleado->cargo->salario) !!}
                            </td>  
                            <td>
                                {{ salarioDiario($empleado->cargo->salario) }} 
                                {{--*/ $salarioDiario[] = salarioDiario($empleado->cargo->salario) /*--}} 
                                {!! Form::hidden('salarioDiario[]', $salarioDiario[$key]) !!}
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
    <div class="tab-pane fade" id="cestaticket">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>EMPLEADO</th>
                        <th>UNIDAD TRIBUTARIA</th>
                        <th>CESTATICKET</th>
                        <th>FALTAS</th>
                        <th>TOTAL DESCUENTO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($empleados as $key => $empleado)
                        <tr class="text-center">
                            <td class="text-left">
                                {{ $empleado->full_name }}
                            </td>
                            <td>
                                {{ $cestaticket->unidad_tributaria }} 
                                {!! Form::hidden('unidad_tributaria[]', $cestaticket->unidad_tributaria) !!} 
                            </td>
                            <td> 
                                {{ cestaticket($empleado, $cestaticket, $diasLaborados[$key]) }} 
                                {{--*/ $cestaticketTotal[] = cestaticket($empleado, $cestaticket, $diasLaborados[$key]) /*--}} 
                                {!! Form::hidden('cestaticket[]', $cestaticketTotal[$key]) !!}
                            </td>
                            <td>
                                {{ faltas($empleado, $assistances, $dates) }} 
                                {{--*/ $faltas[] = faltas($empleado,$assistances,$dates) /*--}} 
                                {!! Form::hidden('faltas[]', $faltas[$key]) !!}
                            </td>
                            <td>
                                {{ descontarCestaticket($empleado, $cestaticket, $faltas[$key]) }} 
                                {{--*/ $descuentoCestaticket[] = descontarCestaticket($empleado, $cestaticket, $faltas[$key]) /*--}} 
                                {!! Form::hidden('descuentoCestaticket[]', $descuentoCestaticket[$key]) !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
