# Cabildo - Sistema de Recaudación Municipal en Línea

## 📋 Descripción

Sistema web de gestión y consulta de deudas municipales que permite a ciudadanos consultar deudas pendientes por cédula/CUI y realizar pagos en línea mediante tarjeta de crédito. Integrado con Oracle Database y pasarela de pagos Kushki para municipalidades en Ecuador.

## 🚀 Tipo de Proyecto

**Aplicación Web** - Sistema de Recaudación Municipal

## 🛠️ Stack Tecnológico

**Backend:**
- PHP 5.x/7.x (procedural + OOP)
- Oracle Database (OCI)
- Composer (kushki/kushki-php v1.2.3, nategood/httpful v0.2.20)

**Frontend:**
- Bootstrap 4.2.1
- jQuery 3.3.1
- DataTables 1.10.18
- Chart.js 2.7.2
- Select2, FullCalendar, CKEditor

**Integración:**
- Kushki Pagos (procesamiento de tarjetas)

## 🏗️ Arquitectura

**Patrón MVC Tradicional:**
```
config/     → Conexión Oracle + helpers
modelos/    → Deudas.php, Abonos.php (25+ métodos)
vistas/     → HTML + JavaScript
ajax/       → Controladores AJAX (deudas.php, abonos.php)
public/     → Assets compilados (Gulp + SASS)
```

## 📁 Estructura Principal

```
cabildo/
├── ajax/
│   ├── deudas.php          # Búsqueda y pago deudas
│   └── abonos.php          # Consulta abonos
├── config/
│   ├── Conexion.php        # Conexión Oracle OCI
│   └── global.php          # Credenciales BD
├── modelos/
│   ├── Deudas.php          # Lógica de deudas
│   └── Abonos.php          # Lógica de abonos
├── vistas/
│   ├── index.php           # Dashboard
│   ├── buscar*.php         # Búsquedas por servicio
│   └── scripts/            # JavaScript
├── public/
│   ├── assets/             # Bootstrap, jQuery, plugins
│   └── dist/               # CSS/JS compilados
└── composer.json
```

## ✨ Características Principales

### 💰 Servicios Municipales

1. **Predios Urbanos** - Impuestos sobre propiedades
2. **Agua Potable** - Tarifas de servicios básicos
3. **Patentes Municipales** - Impuestos de actividad comercial

### 🔍 Consulta de Deudas

- Búsqueda por cédula o CUI
- Filtro por tipo de impuesto
- DataTables con ordenamiento y paginación
- Estados: Pendientes/Abonos
- Detalles: emisión, montos, intereses, coactiva

### 💳 Procesamiento de Pagos

**Integración Kushki:**
- Pago con tarjeta de crédito
- Generación de tokens seguros
- Metadata de transacciones
- Confirmación en tiempo real

### 📊 Dashboard

- 3 cards por categoría de servicio
- Contadores de deudas pendientes
- Enlaces rápidos a búsquedas
- Logos municipales

### ✅ Validación

- Validador ecuatoriano de cédula
- Verificación de dígito verificador
- Validación de formatos

## 🔧 Instalación

### Prerrequisitos

- PHP 7.3+
- Oracle Database 11g+
- Composer
- Servidor web (Apache/Nginx)

### Pasos

```bash
# 1. Clonar
git clone https://github.com/dannyggg3/cabildo.git
cd cabildo

# 2. Instalar dependencias
composer install

# 3. Configurar BD en config/global.php
# Editar credenciales Oracle

# 4. Configurar Kushki
# Agregar Public/Private Merchant ID

# 5. Compilar assets (opcional)
cd public
npm install
gulp build

# 6. Configurar servidor web
# DocumentRoot: /ruta/cabildo/vistas
```

## 💻 Uso

### Consultar Deudas

1. Ir a página principal
2. Seleccionar tipo de servicio
3. Ingresar cédula/CUI
4. Ver resultados en tabla
5. Clic en "Pagar en Línea (PL)" para procesar pago

### Procesar Pago

```javascript
// El sistema genera automáticamente:
// 1. Token de transacción Kushki
// 2. Metadata con datos del contribuyente
// 3. Redirección a checkout Kushki
// 4. Callback de confirmación
```

## 🔌 Endpoints AJAX

| Archivo | Operación | Descripción |
|---------|-----------|-------------|
| `ajax/deudas.php?op=listarDeudas` | GET | Buscar deudas por cédula |
| `ajax/deudas.php?op=totales` | GET | Calcular totales |
| `ajax/deudas.php?op=pagar` | POST | Procesar pago Kushki |
| `ajax/abonos.php?op=listarAbonos` | GET | Consultar abonos |

## 📊 Base de Datos Oracle

**Tablas principales:**
- `tb_contribuyentes`
- `tb_deudas`
- `tb_abonos`
- `tb_servicios`
- `tb_transacciones`

## 🔒 Seguridad

**Implementadas:**
- ✅ Conexión segura Oracle OCI
- ✅ Prepared statements
- ✅ Tokens Kushki
- ✅ Validación de cédula

**Recomendaciones:**
- [ ] Mover credenciales a .env
- [ ] Implementar HTTPS obligatorio
- [ ] Agregar autenticación para admin
- [ ] Rate limiting en búsquedas

## 📈 Estadísticas

| Métrica | Valor |
|---------|-------|
| Modelos | 2 (Deudas, Abonos) |
| Controladores AJAX | 2 |
| Vistas | 22 |
| Scripts JavaScript | 17 |
| Dependencias Composer | 2 |
| Tamaño | 84 MB (con node_modules) |

## 🚀 Despliegue

### Producción

```bash
# Optimizar autoload
composer install --optimize-autoloader --no-dev

# Compilar assets
gulp build --production

# Configurar Apache/Nginx
# Habilitar mod_rewrite si aplica
```

## 🛠️ Troubleshooting

| Problema | Solución |
|----------|----------|
| Error conexión Oracle | Verificar extensión OCI instalada |
| Kushki no procesa | Validar Merchant ID |
| DataTables no carga | Verificar jQuery cargado primero |

## 📄 Licencia

Este proyecto es parte del portafolio de desarrollo de dannyggg3.

## 👤 Autor

**dannyggg3**
- GitHub: [@dannyggg3](https://github.com/dannyggg3)

---

⭐ Sistema de recaudación municipal para modernización de gestión tributaria
