reg add "HKLM\SYSTEM\CurrentControlSet\Control\Session Manager\Environment" /v OPENSSL_CONF /t REG_SZ /d "openssl.cfg"
@cls
@COLOR b
@ECHO PARA ACEPTAR LOS CAMBIOS DEBE REINICIAR MANUALMENTE EL EQUIPO.
@ECHO RECUERDE ALMACENAR LOS TRABAJOS ABIERTOS...
@PAUSE
@COLOR
EXIT
