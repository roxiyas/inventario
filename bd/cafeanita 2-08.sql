--
-- PostgreSQL database dump
--

-- Dumped from database version 12.11 (Ubuntu 12.11-1.pgdg20.04+1)
-- Dumped by pg_dump version 14.4 (Ubuntu 14.4-1.pgdg20.04+1)

-- Started on 2022-08-02 12:03:46 -04

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 6 (class 2615 OID 41043)
-- Name: facturas; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA facturas;


ALTER SCHEMA facturas OWNER TO postgres;

--
-- TOC entry 7 (class 2615 OID 41044)
-- Name: inventario; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA inventario;


ALTER SCHEMA inventario OWNER TO postgres;

--
-- TOC entry 8 (class 2615 OID 41045)
-- Name: luz; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA luz;


ALTER SCHEMA luz OWNER TO postgres;

--
-- TOC entry 9 (class 2615 OID 41046)
-- Name: parametros; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA parametros;


ALTER SCHEMA parametros OWNER TO postgres;

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 3223 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 11 (class 2615 OID 41047)
-- Name: seguridad; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA seguridad;


ALTER SCHEMA seguridad OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 246 (class 1259 OID 58176)
-- Name: reg_prod_fact; Type: TABLE; Schema: facturas; Owner: postgres
--

CREATE TABLE facturas.reg_prod_fact (
    id_reg_prod_fact integer NOT NULL,
    id_registro_fact integer NOT NULL,
    id_producto integer NOT NULL,
    cantidad character varying NOT NULL,
    precio character varying NOT NULL,
    sub_total character varying NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update timestamp without time zone NOT NULL
);


ALTER TABLE facturas.reg_prod_fact OWNER TO postgres;

--
-- TOC entry 245 (class 1259 OID 58174)
-- Name: reg_prod_fact_id_reg_prod_fact_seq; Type: SEQUENCE; Schema: facturas; Owner: postgres
--

CREATE SEQUENCE facturas.reg_prod_fact_id_reg_prod_fact_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE facturas.reg_prod_fact_id_reg_prod_fact_seq OWNER TO postgres;

--
-- TOC entry 3224 (class 0 OID 0)
-- Dependencies: 245
-- Name: reg_prod_fact_id_reg_prod_fact_seq; Type: SEQUENCE OWNED BY; Schema: facturas; Owner: postgres
--

ALTER SEQUENCE facturas.reg_prod_fact_id_reg_prod_fact_seq OWNED BY facturas.reg_prod_fact.id_reg_prod_fact;


--
-- TOC entry 244 (class 1259 OID 58164)
-- Name: registro_fact; Type: TABLE; Schema: facturas; Owner: postgres
--

CREATE TABLE facturas.registro_fact (
    id_registro_fact integer NOT NULL,
    fec_registro date NOT NULL,
    nro_factura character varying NOT NULL,
    id_cliente integer NOT NULL,
    sub_total_2 character varying,
    iva character varying NOT NULL,
    id_moneda integer NOT NULL,
    valor character varying NOT NULL,
    total_mon character varying NOT NULL,
    total money NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update timestamp without time zone NOT NULL,
    id_estatus integer NOT NULL
);


ALTER TABLE facturas.registro_fact OWNER TO postgres;

--
-- TOC entry 243 (class 1259 OID 58162)
-- Name: registro_fact_id_registro_fact_seq; Type: SEQUENCE; Schema: facturas; Owner: postgres
--

CREATE SEQUENCE facturas.registro_fact_id_registro_fact_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE facturas.registro_fact_id_registro_fact_seq OWNER TO postgres;

--
-- TOC entry 3225 (class 0 OID 0)
-- Dependencies: 243
-- Name: registro_fact_id_registro_fact_seq; Type: SEQUENCE OWNED BY; Schema: facturas; Owner: postgres
--

ALTER SEQUENCE facturas.registro_fact_id_registro_fact_seq OWNED BY facturas.registro_fact.id_registro_fact;


--
-- TOC entry 242 (class 1259 OID 58152)
-- Name: inv; Type: TABLE; Schema: inventario; Owner: postgres
--

CREATE TABLE inventario.inv (
    id_inv integer NOT NULL,
    id_producto integer NOT NULL,
    cantidad_stock character varying NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update date NOT NULL
);


ALTER TABLE inventario.inv OWNER TO postgres;

--
-- TOC entry 241 (class 1259 OID 58150)
-- Name: inv_id_inv_seq; Type: SEQUENCE; Schema: inventario; Owner: postgres
--

CREATE SEQUENCE inventario.inv_id_inv_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE inventario.inv_id_inv_seq OWNER TO postgres;

--
-- TOC entry 3226 (class 0 OID 0)
-- Dependencies: 241
-- Name: inv_id_inv_seq; Type: SEQUENCE OWNED BY; Schema: inventario; Owner: postgres
--

ALTER SEQUENCE inventario.inv_id_inv_seq OWNED BY inventario.inv.id_inv;


--
-- TOC entry 236 (class 1259 OID 58116)
-- Name: anul_fact; Type: TABLE; Schema: luz; Owner: postgres
--

CREATE TABLE luz.anul_fact (
    id_anul_fact integer NOT NULL,
    id_registro_fact integer NOT NULL,
    id_producto integer NOT NULL,
    cantidad_stock character varying NOT NULL,
    cantidad_devuelta character varying NOT NULL,
    total_restante character varying NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date NOT NULL
);


ALTER TABLE luz.anul_fact OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 58114)
-- Name: anul_fact_id_anul_fact_seq; Type: SEQUENCE; Schema: luz; Owner: postgres
--

CREATE SEQUENCE luz.anul_fact_id_anul_fact_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE luz.anul_fact_id_anul_fact_seq OWNER TO postgres;

--
-- TOC entry 3227 (class 0 OID 0)
-- Dependencies: 235
-- Name: anul_fact_id_anul_fact_seq; Type: SEQUENCE OWNED BY; Schema: luz; Owner: postgres
--

ALTER SEQUENCE luz.anul_fact_id_anul_fact_seq OWNED BY luz.anul_fact.id_anul_fact;


--
-- TOC entry 234 (class 1259 OID 58107)
-- Name: apr_canc_fac; Type: TABLE; Schema: luz; Owner: postgres
--

CREATE TABLE luz.apr_canc_fac (
    id_a_c_fac integer NOT NULL,
    id_registro_fact integer NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    id_estatus integer NOT NULL
);


ALTER TABLE luz.apr_canc_fac OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 58105)
-- Name: apr_canc_fac_id_a_c_fac_seq; Type: SEQUENCE; Schema: luz; Owner: postgres
--

CREATE SEQUENCE luz.apr_canc_fac_id_a_c_fac_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE luz.apr_canc_fac_id_a_c_fac_seq OWNER TO postgres;

--
-- TOC entry 3228 (class 0 OID 0)
-- Dependencies: 233
-- Name: apr_canc_fac_id_a_c_fac_seq; Type: SEQUENCE OWNED BY; Schema: luz; Owner: postgres
--

ALTER SEQUENCE luz.apr_canc_fac_id_a_c_fac_seq OWNED BY luz.apr_canc_fac.id_a_c_fac;


--
-- TOC entry 232 (class 1259 OID 58095)
-- Name: inv_resp; Type: TABLE; Schema: luz; Owner: postgres
--

CREATE TABLE luz.inv_resp (
    id_inv_resp integer NOT NULL,
    id_producto integer NOT NULL,
    cantidad_stock character varying NOT NULL,
    cantidad_sumar character varying NOT NULL,
    total_agr character varying NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update date NOT NULL,
    tabla character varying NOT NULL
);


ALTER TABLE luz.inv_resp OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 58093)
-- Name: inv_resp_id_inv_resp_seq; Type: SEQUENCE; Schema: luz; Owner: postgres
--

CREATE SEQUENCE luz.inv_resp_id_inv_resp_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE luz.inv_resp_id_inv_resp_seq OWNER TO postgres;

--
-- TOC entry 3229 (class 0 OID 0)
-- Dependencies: 231
-- Name: inv_resp_id_inv_resp_seq; Type: SEQUENCE OWNED BY; Schema: luz; Owner: postgres
--

ALTER SEQUENCE luz.inv_resp_id_inv_resp_seq OWNED BY luz.inv_resp.id_inv_resp;


--
-- TOC entry 230 (class 1259 OID 58083)
-- Name: mov_consig; Type: TABLE; Schema: luz; Owner: postgres
--

CREATE TABLE luz.mov_consig (
    id_mov_consig integer NOT NULL,
    id_registro_fact integer NOT NULL,
    id_tipo_pago integer NOT NULL,
    banco character varying,
    nro_referencia character varying,
    total_ant_bs character varying NOT NULL,
    id_moneda integer NOT NULL,
    valor character varying NOT NULL,
    total_om character varying NOT NULL,
    total_abonado_bs character varying,
    total_abonado_om character varying,
    restante_bs character varying,
    restante_om character varying,
    id_user integer NOT NULL,
    id_estatus integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL
);


ALTER TABLE luz.mov_consig OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 58081)
-- Name: mov_consig_id_mov_consig_seq; Type: SEQUENCE; Schema: luz; Owner: postgres
--

CREATE SEQUENCE luz.mov_consig_id_mov_consig_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE luz.mov_consig_id_mov_consig_seq OWNER TO postgres;

--
-- TOC entry 3230 (class 0 OID 0)
-- Dependencies: 229
-- Name: mov_consig_id_mov_consig_seq; Type: SEQUENCE OWNED BY; Schema: luz; Owner: postgres
--

ALTER SEQUENCE luz.mov_consig_id_mov_consig_seq OWNED BY luz.mov_consig.id_mov_consig;


--
-- TOC entry 238 (class 1259 OID 58125)
-- Name: mov_prod_cons; Type: TABLE; Schema: luz; Owner: postgres
--

CREATE TABLE luz.mov_prod_cons (
    id_reg_fact integer NOT NULL,
    id_registro_fact integer NOT NULL,
    id_producto integer NOT NULL,
    cantidad_stock character varying NOT NULL,
    cantidad_solicitada character varying NOT NULL,
    total_restante character varying NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    id_estatus integer NOT NULL
);


ALTER TABLE luz.mov_prod_cons OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 58123)
-- Name: mov_prod_cons_id_reg_fact_seq; Type: SEQUENCE; Schema: luz; Owner: postgres
--

CREATE SEQUENCE luz.mov_prod_cons_id_reg_fact_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE luz.mov_prod_cons_id_reg_fact_seq OWNER TO postgres;

--
-- TOC entry 3231 (class 0 OID 0)
-- Dependencies: 237
-- Name: mov_prod_cons_id_reg_fact_seq; Type: SEQUENCE OWNED BY; Schema: luz; Owner: postgres
--

ALTER SEQUENCE luz.mov_prod_cons_id_reg_fact_seq OWNED BY luz.mov_prod_cons.id_reg_fact;


--
-- TOC entry 207 (class 1259 OID 41116)
-- Name: categoria; Type: TABLE; Schema: parametros; Owner: postgres
--

CREATE TABLE parametros.categoria (
    id_categoria integer NOT NULL,
    descripcion character varying NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update date NOT NULL
);


ALTER TABLE parametros.categoria OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 41123)
-- Name: categoria_id_categoria_seq; Type: SEQUENCE; Schema: parametros; Owner: postgres
--

CREATE SEQUENCE parametros.categoria_id_categoria_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE parametros.categoria_id_categoria_seq OWNER TO postgres;

--
-- TOC entry 3232 (class 0 OID 0)
-- Dependencies: 208
-- Name: categoria_id_categoria_seq; Type: SEQUENCE OWNED BY; Schema: parametros; Owner: postgres
--

ALTER SEQUENCE parametros.categoria_id_categoria_seq OWNED BY parametros.categoria.id_categoria;


--
-- TOC entry 209 (class 1259 OID 41125)
-- Name: cliente; Type: TABLE; Schema: parametros; Owner: postgres
--

CREATE TABLE parametros.cliente (
    id_cliente integer NOT NULL,
    id_estado integer NOT NULL,
    id_ciudad integer NOT NULL,
    id_municipio integer NOT NULL,
    id_parroquia integer NOT NULL,
    dir_fiscal character varying NOT NULL,
    id_tip_doc integer NOT NULL,
    cod_rif character varying NOT NULL,
    nom_razon_social character varying NOT NULL,
    nro_telefono character varying NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update timestamp without time zone NOT NULL
);


ALTER TABLE parametros.cliente OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 41132)
-- Name: cliente_id_cliente_seq; Type: SEQUENCE; Schema: parametros; Owner: postgres
--

CREATE SEQUENCE parametros.cliente_id_cliente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE parametros.cliente_id_cliente_seq OWNER TO postgres;

--
-- TOC entry 3233 (class 0 OID 0)
-- Dependencies: 210
-- Name: cliente_id_cliente_seq; Type: SEQUENCE OWNED BY; Schema: parametros; Owner: postgres
--

ALTER SEQUENCE parametros.cliente_id_cliente_seq OWNED BY parametros.cliente.id_cliente;


--
-- TOC entry 211 (class 1259 OID 41134)
-- Name: conv_moneda; Type: TABLE; Schema: parametros; Owner: postgres
--

CREATE TABLE parametros.conv_moneda (
    id_moneda integer NOT NULL,
    descripcion character varying NOT NULL,
    valor character varying NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update date NOT NULL
);


ALTER TABLE parametros.conv_moneda OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 41141)
-- Name: conv_moneda_id_moneda_seq; Type: SEQUENCE; Schema: parametros; Owner: postgres
--

CREATE SEQUENCE parametros.conv_moneda_id_moneda_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE parametros.conv_moneda_id_moneda_seq OWNER TO postgres;

--
-- TOC entry 3234 (class 0 OID 0)
-- Dependencies: 212
-- Name: conv_moneda_id_moneda_seq; Type: SEQUENCE OWNED BY; Schema: parametros; Owner: postgres
--

ALTER SEQUENCE parametros.conv_moneda_id_moneda_seq OWNED BY parametros.conv_moneda.id_moneda;


--
-- TOC entry 240 (class 1259 OID 58137)
-- Name: producto; Type: TABLE; Schema: parametros; Owner: postgres
--

CREATE TABLE parametros.producto (
    id_producto integer NOT NULL,
    id_categoria integer NOT NULL,
    nom_producto character varying NOT NULL,
    precio character varying NOT NULL,
    cantidad_stock character varying NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update date NOT NULL
);


ALTER TABLE parametros.producto OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 58135)
-- Name: producto_id_producto_seq; Type: SEQUENCE; Schema: parametros; Owner: postgres
--

CREATE SEQUENCE parametros.producto_id_producto_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE parametros.producto_id_producto_seq OWNER TO postgres;

--
-- TOC entry 3235 (class 0 OID 0)
-- Dependencies: 239
-- Name: producto_id_producto_seq; Type: SEQUENCE OWNED BY; Schema: parametros; Owner: postgres
--

ALTER SEQUENCE parametros.producto_id_producto_seq OWNED BY parametros.producto.id_producto;


--
-- TOC entry 213 (class 1259 OID 41152)
-- Name: tip_doc; Type: TABLE; Schema: parametros; Owner: postgres
--

CREATE TABLE parametros.tip_doc (
    id_tip_doc integer NOT NULL,
    descripcion character varying NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update date NOT NULL
);


ALTER TABLE parametros.tip_doc OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 41159)
-- Name: tip_doc_id_tip_doc_seq; Type: SEQUENCE; Schema: parametros; Owner: postgres
--

CREATE SEQUENCE parametros.tip_doc_id_tip_doc_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE parametros.tip_doc_id_tip_doc_seq OWNER TO postgres;

--
-- TOC entry 3236 (class 0 OID 0)
-- Dependencies: 214
-- Name: tip_doc_id_tip_doc_seq; Type: SEQUENCE OWNED BY; Schema: parametros; Owner: postgres
--

ALTER SEQUENCE parametros.tip_doc_id_tip_doc_seq OWNED BY parametros.tip_doc.id_tip_doc;


--
-- TOC entry 228 (class 1259 OID 49339)
-- Name: tip_pago; Type: TABLE; Schema: parametros; Owner: postgres
--

CREATE TABLE parametros.tip_pago (
    id_tip_pago integer NOT NULL,
    descripcion character varying NOT NULL,
    id_user integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update date NOT NULL
);


ALTER TABLE parametros.tip_pago OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 49337)
-- Name: tip_pago_id_tip_pago_seq; Type: SEQUENCE; Schema: parametros; Owner: postgres
--

CREATE SEQUENCE parametros.tip_pago_id_tip_pago_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE parametros.tip_pago_id_tip_pago_seq OWNER TO postgres;

--
-- TOC entry 3237 (class 0 OID 0)
-- Dependencies: 227
-- Name: tip_pago_id_tip_pago_seq; Type: SEQUENCE OWNED BY; Schema: parametros; Owner: postgres
--

ALTER SEQUENCE parametros.tip_pago_id_tip_pago_seq OWNED BY parametros.tip_pago.id_tip_pago;


--
-- TOC entry 215 (class 1259 OID 41161)
-- Name: ciudades; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ciudades (
    id integer NOT NULL,
    estado_id integer NOT NULL,
    descciu character varying(50) NOT NULL
);


ALTER TABLE public.ciudades OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 41164)
-- Name: ciudades_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ciudades_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ciudades_id_seq OWNER TO postgres;

--
-- TOC entry 3238 (class 0 OID 0)
-- Dependencies: 216
-- Name: ciudades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ciudades_id_seq OWNED BY public.ciudades.id;


--
-- TOC entry 217 (class 1259 OID 41166)
-- Name: estados; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estados (
    id integer NOT NULL,
    descedo character varying(50) NOT NULL
);


ALTER TABLE public.estados OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 41169)
-- Name: estados_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estados_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estados_id_seq OWNER TO postgres;

--
-- TOC entry 3239 (class 0 OID 0)
-- Dependencies: 218
-- Name: estados_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estados_id_seq OWNED BY public.estados.id;


--
-- TOC entry 219 (class 1259 OID 41171)
-- Name: municipios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.municipios (
    id_municipio integer NOT NULL,
    descripcion character varying,
    id_estado integer
);


ALTER TABLE public.municipios OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 41177)
-- Name: parroquias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.parroquias (
    id_parroquia integer NOT NULL,
    descripcion character varying,
    id_municipio integer
);


ALTER TABLE public.parroquias OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 41183)
-- Name: estatus; Type: TABLE; Schema: seguridad; Owner: postgres
--

CREATE TABLE seguridad.estatus (
    id_estatus integer NOT NULL,
    descripcion character varying NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update timestamp without time zone NOT NULL
);


ALTER TABLE seguridad.estatus OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 41190)
-- Name: perfil; Type: TABLE; Schema: seguridad; Owner: postgres
--

CREATE TABLE seguridad.perfil (
    id_perfil integer NOT NULL,
    descripcion character varying NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update timestamp without time zone NOT NULL
);


ALTER TABLE seguridad.perfil OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 41197)
-- Name: persona; Type: TABLE; Schema: seguridad; Owner: postgres
--

CREATE TABLE seguridad.persona (
    id_persona integer NOT NULL,
    id_tip_doc integer NOT NULL,
    cedula character varying NOT NULL,
    nom_ape character varying NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update timestamp without time zone NOT NULL
);


ALTER TABLE seguridad.persona OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 41204)
-- Name: persona_id_persona_seq; Type: SEQUENCE; Schema: seguridad; Owner: postgres
--

CREATE SEQUENCE seguridad.persona_id_persona_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seguridad.persona_id_persona_seq OWNER TO postgres;

--
-- TOC entry 3240 (class 0 OID 0)
-- Dependencies: 224
-- Name: persona_id_persona_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE seguridad.persona_id_persona_seq OWNED BY seguridad.persona.id_persona;


--
-- TOC entry 225 (class 1259 OID 41206)
-- Name: usuarios; Type: TABLE; Schema: seguridad; Owner: postgres
--

CREATE TABLE seguridad.usuarios (
    id_user integer NOT NULL,
    usuario character varying NOT NULL,
    contrasenia text NOT NULL,
    id_perfil integer NOT NULL,
    id_persona integer NOT NULL,
    fecha_reg date DEFAULT now() NOT NULL,
    fecha_update timestamp without time zone NOT NULL,
    id_estatus integer
);


ALTER TABLE seguridad.usuarios OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 41213)
-- Name: usuarios_id_user_seq; Type: SEQUENCE; Schema: seguridad; Owner: postgres
--

CREATE SEQUENCE seguridad.usuarios_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE seguridad.usuarios_id_user_seq OWNER TO postgres;

--
-- TOC entry 3241 (class 0 OID 0)
-- Dependencies: 226
-- Name: usuarios_id_user_seq; Type: SEQUENCE OWNED BY; Schema: seguridad; Owner: postgres
--

ALTER SEQUENCE seguridad.usuarios_id_user_seq OWNED BY seguridad.usuarios.id_user;


--
-- TOC entry 3007 (class 2604 OID 58179)
-- Name: reg_prod_fact id_reg_prod_fact; Type: DEFAULT; Schema: facturas; Owner: postgres
--

ALTER TABLE ONLY facturas.reg_prod_fact ALTER COLUMN id_reg_prod_fact SET DEFAULT nextval('facturas.reg_prod_fact_id_reg_prod_fact_seq'::regclass);


--
-- TOC entry 3005 (class 2604 OID 58167)
-- Name: registro_fact id_registro_fact; Type: DEFAULT; Schema: facturas; Owner: postgres
--

ALTER TABLE ONLY facturas.registro_fact ALTER COLUMN id_registro_fact SET DEFAULT nextval('facturas.registro_fact_id_registro_fact_seq'::regclass);


--
-- TOC entry 3003 (class 2604 OID 58155)
-- Name: inv id_inv; Type: DEFAULT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.inv ALTER COLUMN id_inv SET DEFAULT nextval('inventario.inv_id_inv_seq'::regclass);


--
-- TOC entry 2998 (class 2604 OID 58119)
-- Name: anul_fact id_anul_fact; Type: DEFAULT; Schema: luz; Owner: postgres
--

ALTER TABLE ONLY luz.anul_fact ALTER COLUMN id_anul_fact SET DEFAULT nextval('luz.anul_fact_id_anul_fact_seq'::regclass);


--
-- TOC entry 2996 (class 2604 OID 58110)
-- Name: apr_canc_fac id_a_c_fac; Type: DEFAULT; Schema: luz; Owner: postgres
--

ALTER TABLE ONLY luz.apr_canc_fac ALTER COLUMN id_a_c_fac SET DEFAULT nextval('luz.apr_canc_fac_id_a_c_fac_seq'::regclass);


--
-- TOC entry 2994 (class 2604 OID 58098)
-- Name: inv_resp id_inv_resp; Type: DEFAULT; Schema: luz; Owner: postgres
--

ALTER TABLE ONLY luz.inv_resp ALTER COLUMN id_inv_resp SET DEFAULT nextval('luz.inv_resp_id_inv_resp_seq'::regclass);


--
-- TOC entry 2992 (class 2604 OID 58086)
-- Name: mov_consig id_mov_consig; Type: DEFAULT; Schema: luz; Owner: postgres
--

ALTER TABLE ONLY luz.mov_consig ALTER COLUMN id_mov_consig SET DEFAULT nextval('luz.mov_consig_id_mov_consig_seq'::regclass);


--
-- TOC entry 2999 (class 2604 OID 58128)
-- Name: mov_prod_cons id_reg_fact; Type: DEFAULT; Schema: luz; Owner: postgres
--

ALTER TABLE ONLY luz.mov_prod_cons ALTER COLUMN id_reg_fact SET DEFAULT nextval('luz.mov_prod_cons_id_reg_fact_seq'::regclass);


--
-- TOC entry 2975 (class 2604 OID 41223)
-- Name: categoria id_categoria; Type: DEFAULT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.categoria ALTER COLUMN id_categoria SET DEFAULT nextval('parametros.categoria_id_categoria_seq'::regclass);


--
-- TOC entry 2977 (class 2604 OID 41224)
-- Name: cliente id_cliente; Type: DEFAULT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.cliente ALTER COLUMN id_cliente SET DEFAULT nextval('parametros.cliente_id_cliente_seq'::regclass);


--
-- TOC entry 2979 (class 2604 OID 41225)
-- Name: conv_moneda id_moneda; Type: DEFAULT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.conv_moneda ALTER COLUMN id_moneda SET DEFAULT nextval('parametros.conv_moneda_id_moneda_seq'::regclass);


--
-- TOC entry 3001 (class 2604 OID 58140)
-- Name: producto id_producto; Type: DEFAULT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.producto ALTER COLUMN id_producto SET DEFAULT nextval('parametros.producto_id_producto_seq'::regclass);


--
-- TOC entry 2981 (class 2604 OID 41227)
-- Name: tip_doc id_tip_doc; Type: DEFAULT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.tip_doc ALTER COLUMN id_tip_doc SET DEFAULT nextval('parametros.tip_doc_id_tip_doc_seq'::regclass);


--
-- TOC entry 2990 (class 2604 OID 49342)
-- Name: tip_pago id_tip_pago; Type: DEFAULT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.tip_pago ALTER COLUMN id_tip_pago SET DEFAULT nextval('parametros.tip_pago_id_tip_pago_seq'::regclass);


--
-- TOC entry 2982 (class 2604 OID 41228)
-- Name: ciudades id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ciudades ALTER COLUMN id SET DEFAULT nextval('public.ciudades_id_seq'::regclass);


--
-- TOC entry 2983 (class 2604 OID 41229)
-- Name: estados id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estados ALTER COLUMN id SET DEFAULT nextval('public.estados_id_seq'::regclass);


--
-- TOC entry 2987 (class 2604 OID 41230)
-- Name: persona id_persona; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.persona ALTER COLUMN id_persona SET DEFAULT nextval('seguridad.persona_id_persona_seq'::regclass);


--
-- TOC entry 2989 (class 2604 OID 41231)
-- Name: usuarios id_user; Type: DEFAULT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.usuarios ALTER COLUMN id_user SET DEFAULT nextval('seguridad.usuarios_id_user_seq'::regclass);


--
-- TOC entry 3217 (class 0 OID 58176)
-- Dependencies: 246
-- Data for Name: reg_prod_fact; Type: TABLE DATA; Schema: facturas; Owner: postgres
--

COPY facturas.reg_prod_fact (id_reg_prod_fact, id_registro_fact, id_producto, cantidad, precio, sub_total, fecha_reg, fecha_update) FROM stdin;
\.


--
-- TOC entry 3215 (class 0 OID 58164)
-- Dependencies: 244
-- Data for Name: registro_fact; Type: TABLE DATA; Schema: facturas; Owner: postgres
--

COPY facturas.registro_fact (id_registro_fact, fec_registro, nro_factura, id_cliente, sub_total_2, iva, id_moneda, valor, total_mon, total, id_user, fecha_reg, fecha_update, id_estatus) FROM stdin;
\.


--
-- TOC entry 3213 (class 0 OID 58152)
-- Dependencies: 242
-- Data for Name: inv; Type: TABLE DATA; Schema: inventario; Owner: postgres
--

COPY inventario.inv (id_inv, id_producto, cantidad_stock, id_user, fecha_reg, fecha_update) FROM stdin;
1	1	15	1	2022-08-02	2022-08-02
2	2	1000	1	2022-08-02	2022-08-02
\.


--
-- TOC entry 3207 (class 0 OID 58116)
-- Dependencies: 236
-- Data for Name: anul_fact; Type: TABLE DATA; Schema: luz; Owner: postgres
--

COPY luz.anul_fact (id_anul_fact, id_registro_fact, id_producto, cantidad_stock, cantidad_devuelta, total_restante, id_user, fecha_reg) FROM stdin;
\.


--
-- TOC entry 3205 (class 0 OID 58107)
-- Dependencies: 234
-- Data for Name: apr_canc_fac; Type: TABLE DATA; Schema: luz; Owner: postgres
--

COPY luz.apr_canc_fac (id_a_c_fac, id_registro_fact, id_user, fecha_reg, id_estatus) FROM stdin;
\.


--
-- TOC entry 3203 (class 0 OID 58095)
-- Dependencies: 232
-- Data for Name: inv_resp; Type: TABLE DATA; Schema: luz; Owner: postgres
--

COPY luz.inv_resp (id_inv_resp, id_producto, cantidad_stock, cantidad_sumar, total_agr, id_user, fecha_reg, fecha_update, tabla) FROM stdin;
1	1	15	0	15	1	2022-08-02	2022-08-02	R
2	2	1000	0	1000	1	2022-08-02	2022-08-02	R
\.


--
-- TOC entry 3201 (class 0 OID 58083)
-- Dependencies: 230
-- Data for Name: mov_consig; Type: TABLE DATA; Schema: luz; Owner: postgres
--

COPY luz.mov_consig (id_mov_consig, id_registro_fact, id_tipo_pago, banco, nro_referencia, total_ant_bs, id_moneda, valor, total_om, total_abonado_bs, total_abonado_om, restante_bs, restante_om, id_user, id_estatus, fecha_reg) FROM stdin;
\.


--
-- TOC entry 3209 (class 0 OID 58125)
-- Dependencies: 238
-- Data for Name: mov_prod_cons; Type: TABLE DATA; Schema: luz; Owner: postgres
--

COPY luz.mov_prod_cons (id_reg_fact, id_registro_fact, id_producto, cantidad_stock, cantidad_solicitada, total_restante, id_user, fecha_reg, id_estatus) FROM stdin;
\.


--
-- TOC entry 3178 (class 0 OID 41116)
-- Dependencies: 207
-- Data for Name: categoria; Type: TABLE DATA; Schema: parametros; Owner: postgres
--

COPY parametros.categoria (id_categoria, descripcion, id_user, fecha_reg, fecha_update) FROM stdin;
1	Panadería	1	2022-04-30	2022-04-30
2	Pastelería	1	2022-04-30	2022-04-30
3	Chuchería	1	2022-04-30	2022-04-30
4	Cafetería	1	2022-08-02	2022-08-02
\.


--
-- TOC entry 3180 (class 0 OID 41125)
-- Dependencies: 209
-- Data for Name: cliente; Type: TABLE DATA; Schema: parametros; Owner: postgres
--

COPY parametros.cliente (id_cliente, id_estado, id_ciudad, id_municipio, id_parroquia, dir_fiscal, id_tip_doc, cod_rif, nom_razon_social, nro_telefono, id_user, fecha_reg, fecha_update) FROM stdin;
1	1	1	2	17	DGTI / Piso 11	1	21601055	Roxi Yasmin Pabón	3351	1	2022-04-30	2022-05-01 00:00:00
\.


--
-- TOC entry 3182 (class 0 OID 41134)
-- Dependencies: 211
-- Data for Name: conv_moneda; Type: TABLE DATA; Schema: parametros; Owner: postgres
--

COPY parametros.conv_moneda (id_moneda, descripcion, valor, id_user, fecha_reg, fecha_update) FROM stdin;
4	Dolar	5,95	1	2021-03-22	2022-08-02
\.


--
-- TOC entry 3211 (class 0 OID 58137)
-- Dependencies: 240
-- Data for Name: producto; Type: TABLE DATA; Schema: parametros; Owner: postgres
--

COPY parametros.producto (id_producto, id_categoria, nom_producto, precio, cantidad_stock, id_user, fecha_reg, fecha_update) FROM stdin;
1	1	Mini de queso	5,00	15	1	2022-08-02	2022-08-02
2	4	Café con leche (Grande)	5,00	1000	1	2022-08-02	2022-08-02
\.


--
-- TOC entry 3184 (class 0 OID 41152)
-- Dependencies: 213
-- Data for Name: tip_doc; Type: TABLE DATA; Schema: parametros; Owner: postgres
--

COPY parametros.tip_doc (id_tip_doc, descripcion, id_user, fecha_reg, fecha_update) FROM stdin;
1	V	1	2021-01-03	2021-01-03
2	J	2	2021-01-03	2021-01-03
\.


--
-- TOC entry 3199 (class 0 OID 49339)
-- Dependencies: 228
-- Data for Name: tip_pago; Type: TABLE DATA; Schema: parametros; Owner: postgres
--

COPY parametros.tip_pago (id_tip_pago, descripcion, id_user, fecha_reg, fecha_update) FROM stdin;
1	A deuda	1	2022-05-19	2022-05-19
2	Tranferencia	1	2022-05-19	2022-05-19
3	Pago Móvil	1	2022-05-19	2022-05-19
4	Efectivo	1	2022-05-19	2022-05-19
5	Efectivo en Otra Moneda	1	2022-05-19	2022-05-19
\.


--
-- TOC entry 3186 (class 0 OID 41161)
-- Dependencies: 215
-- Data for Name: ciudades; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ciudades (id, estado_id, descciu) FROM stdin;
1	1	Caracas
2	2	La Esmeralda
3	2	San Fernando de Atabapo
4	2	Puerto Ayacucho
5	2	Isla Ratón
6	2	Maroa
7	2	San Juan de Manapiare
8	2	San Carlos de Río Negro
9	3	Anaco
10	3	Aragua de Barcelona
11	3	Puerto Píritu
12	3	Valle de Guanape
13	3	Pariaguán
14	3	Guanta
15	3	Soledad
16	3	Puerto La Cruz
17	3	Onoto
18	3	Mapire
19	3	San Mateo
20	3	Clarines
21	3	Cantaura
22	3	Píritu
23	3	San José de Guanipa (El Tigrito)
24	3	Boca de Uchire
25	3	Santa Ana
26	3	Barcelona
27	3	El Tigre
28	3	El Chaparro
29	3	Lecherías
30	4	Achaguas
31	4	Biruaca
32	4	Bruzual
33	4	Guasdualito
34	4	San Juan de Payara
35	4	Elorza
36	4	San Fernando de Apure
37	5	San Mateo
38	5	Camatagua
39	5	Maracay
40	5	Santa Cruz
41	5	La Victoria
42	5	El Consejo
43	5	Palo Negro
44	5	El Limón
45	5	San Casimiro
46	5	San Sebastián
47	5	Turmero
48	5	Las Tejerías
49	5	Cagua
50	5	La Colonia Tovar
51	5	Barbacoas
52	5	Villa de Cura
53	5	Santa Rita
54	5	Ocumare de la Costa
55	6	Sabaneta
56	6	Socopó
57	6	Arismendi
58	6	Barinas
59	6	Barinitas
60	6	Barrancas
61	6	Santa Bárbara
62	6	Obispos
63	6	ciudades Bolivia
64	6	Libertad
65	6	ciudades de Nutrias
66	6	El Cantón
67	7	ciudades Guayana
68	7	Caicara del Orinoco
69	7	El Callao
70	7	Santa Elena de Uairén
71	7	ciudades Bolívar
72	7	Upata
73	7	ciudades Piar
74	7	Guasipati
75	7	Tumeremo
76	7	Maripa
77	7	El Palmar
78	8	Bejuma
79	8	Güigüe
80	8	Mariara
81	8	Guacara
82	8	Morón
83	8	Tocuyito
84	8	Los Guayos
85	8	Miranda
86	8	Montalbán
87	8	Naguanagua
88	8	Puerto Cabello
89	8	San Diego
90	8	San Joaquín
91	8	Valencia
92	9	Cojedes
93	9	Tinaquillo
94	9	El Baúl
95	9	Macapo
96	9	El Pao
97	9	Libertad
98	9	Las Vegas
99	9	San Carlos
100	9	Tinaco
101	10	Curiapo
102	10	Sierra Imataca
103	10	Pedernales
104	10	Tucupita
105	11	San Juan de los Cayos
106	11	San Luis
107	11	Capatárida
108	11	Yaracal
109	11	Punto Fijo
110	11	La Vela de Coro
111	11	Dabajuro
112	11	Pedregal
113	11	Pueblo Nuevo
114	11	Churuguara
115	11	Jacura
116	11	Santa Cruz de Los Taques
117	11	Mene de Mauroa
118	11	Santa Ana de Coro
119	11	Chichiriviche
120	11	Palmasola
121	11	Cabure
122	11	Píritu
123	11	Mirimire
124	11	Tucacas
125	11	La Cruz de Taratara
126	11	Tocópero
127	11	Santa Cruz de Bucaral
128	11	Urumaco
129	11	Puerto Cumarebo
130	12	Camaguán
131	12	Chaguaramas
132	12	El Socorro
133	12	Guayabal
134	12	Valle de La Pascua
135	12	Las Mercedes
136	12	El Sombrero
137	12	Calabozo
138	12	Altagracia de Orituco
139	12	Ortiz
140	12	Tucupido
141	12	San Juan de los Morros
142	12	San José de Guaribe
143	12	Santa María de Ipire
144	12	Zaraza
145	13	Sanare
146	13	Duaca
147	13	Barquisimeto
148	13	Quíbor
149	13	El Tocuyo
150	13	Cabudare
151	13	Sarare
152	13	Carora
153	13	Siquisique
154	14	El Vigía
155	14	La Azulita
156	14	Santa Cruz de Mora
157	14	Aricagua
158	14	Canaguá
159	14	Ejido
160	14	Tucaní
161	14	Santo Domingo
162	14	Guaraque
163	14	Arapuey
164	14	Torondoy
165	14	Mérida
166	14	Timotes
167	14	Santa Elena de Arenales
168	14	Santa María de Caparo
169	14	Pueblo Llano
170	14	Mucuchíes
171	14	Bailadores
172	14	Tabay
173	14	Lagunillas
174	14	Tovar
175	14	Nueva Bolivia
176	14	Zea
177	15	Caucagua
178	15	San José de Barlovento
179	15	Nuestra Señora del Rosario de Baruta
180	15	Higuerote
181	15	Mamporal
182	15	Carrizal
183	15	Chacao
184	15	Charallave
185	15	El Hatillo
186	15	Los Teques
187	15	Santa Teresa del Tuy
188	15	Ocumare del Tuy
189	15	San Antonio de Los Altos
190	15	Río Chico
191	15	Santa Lucía
192	15	Cúpira
193	15	Guarenas
194	15	San Francisco de Yare
195	15	Petare
196	15	Cúa
197	15	Guatire
198	16	Caripe
199	16	Caicara
200	16	Punta de Mata
201	16	Temblador
202	16	Maturín
203	16	Aragua
204	16	Quiriquire
205	16	Santa Bárbara
206	16	Barrancas
207	16	Uracoa
208	16	San Antonio
209	16	Aguasay
210	16	Caripito
211	17	El Valle del Espíritu Santo
212	17	Santa Ana
213	17	Pampatar
214	17	La Plaza de Paraguachí
215	17	La Asunción
216	17	San Juan Bautista
217	17	Juangriego
218	17	Porlamar
219	17	Boca del Río
220	17	Punta de Piedras
221	17	San Pedro de Coche
222	18	Agua Blanca
223	18	Araure
224	18	Píritu
225	18	Guanare
226	18	Guanarito
227	18	Paraíso de Chabasquén
228	18	Ospino
229	18	Acarigua
230	18	Papelón
231	18	Boconoito
232	18	San Rafael de Onoto
233	18	El Playón
234	18	Biscucuy
235	18	Villa Bruzual
236	19	Casanay
237	19	San José de Aerocuar
238	19	Río Caribe
239	19	El Pilar
240	19	Carúpano
241	19	Marigüitar
242	19	Yaguaraparo
243	19	Araya
244	19	Tunapuy
245	19	Irapa
246	19	San Antonio del Golfo
247	19	Cumanacoa
248	19	Cariaco
249	19	Cumaná
250	19	Güiria
251	20	Cordero
252	20	Las Mesas
253	20	Colón
254	20	San Antonio del Táchira
255	20	Táriba
256	20	Santa Ana
257	20	San Rafael del Piñal
258	20	San José de Bolívar
259	20	La Fría
260	20	Palmira
261	20	Capacho Nuevo
262	20	La Grita
263	20	EL Cobre
264	20	Rubio
265	20	Capacho Viejo
266	20	Abejales
267	20	Lobatera
268	20	Michelena
269	20	Coloncito
270	20	Ureña
271	20	Delicias
272	20	La Tendida
273	20	San Cristóbal
274	20	Seboruco
275	20	San Simón
276	20	Queniquea
277	20	San Josecito
278	20	Pregonero
279	20	Umuquena
280	21	Santa Isabel
281	21	Boconó
282	21	Sabana Grande
283	21	Chejendé
284	21	Carache
285	21	Escuque
286	21	El Paradero
287	21	Campo Elías
288	21	Santa Apolonia
289	21	El Dividive
290	21	Monte Carmelo
291	21	Motatán
292	21	Pampán
293	21	Pampanito
294	21	Betijoque
295	21	Carvajal
296	21	Sabana de Mendoza
297	21	Trujillo
298	21	La Quebrada
299	21	Valera
300	22	San Pablo
301	22	Aroa
302	22	Chivacoa
303	22	Cocorote
304	22	Independencia
305	22	Sabana de Parra
306	22	Boraure
307	22	Yumare
308	22	Nirgua
309	22	Yaritagua
310	22	San Felipe
311	22	Guama
312	22	Urachiche
313	22	Farriar
314	23	El Toro
315	23	San Timoteo
316	23	Cabimas
317	23	Encontrados
318	23	San Carlos del Zulia
319	23	Pueblo Nuevo El Chivo
320	23	La Concepción
321	23	Casigua El Cubo
322	23	Concepción
323	23	ciudades Ojeda
324	23	Machiques
325	23	San Rafael de El Moján
326	23	Maracaibo
327	23	Los Puertos de Altagracia
328	23	Sinamaica
329	23	La Villa del Rosario
330	23	San Francisco
331	23	Santa Rita
332	23	Tía Juana
333	23	Bobures
334	23	Bachaquero
335	24	La Guaira
336	15	Caracas
338	3	Tigrito
\.


--
-- TOC entry 3188 (class 0 OID 41166)
-- Dependencies: 217
-- Data for Name: estados; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estados (id, descedo) FROM stdin;
1	Distrito Capital
2	Amazonas
3	Anzoategui
4	Apure
5	Aragua
6	Barinas
7	Bolivar
8	Carabobo
9	Cojedes
10	Delta Amacuro
11	Falcon
12	Guarico
13	Lara
14	Merida
15	Miranda
16	Monagas
17	Nueva Esparta
18	Portuguesa
19	Sucre
20	Tachira
21	Trujillo
22	Yaracuy
23	Zulia
24	Vargas
25	Todos
\.


--
-- TOC entry 3190 (class 0 OID 41171)
-- Dependencies: 219
-- Data for Name: municipios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.municipios (id_municipio, descripcion, id_estado) FROM stdin;
5	AUTONOMO ATURES	2
6	AUTONOMO AUTANA	2
11	ANACO	3
7	Autonomo MAROA 	2
9	AUTONOMO RIO NEGRO	2
12	ARAGUA	3
13	FERNANDO DE PENALVER	3
14	FRANCISCO DEL CARMEN CARVAJAL	3
15	FRANCISCO DE MIRANDA	3
16	GUANTA	3
17	INDEPENDENCIA	3
18	JUAN ANTONIO SOTILLO	3
19	JUAN MANUEL CAJIGAL	3
20	JOSE GREGORIO MONAGAS	3
21	LIBERTAD	3
23	PEDRO MARIA FREITES	3
24	PIRITU	3
26	SAN JUENA DE CAPISTRANO	3
27	SANTA ANA	3
28	SIMON BOLIVAR	3
29	SIMON RODRIGUEZ	3
30	SIR ARTHUR MC GREGOR	3
31	DIEGO BAUTISTA URDANETA	3
33	ACHAGUAS	4
34	BIRUACA	4
35	MUNOZ	4
36	PAEZ	4
37	PEDRO CAMEJO	4
39	SAN FERNANDO	4
45	JOSE FELIZ RIBAS	5
41	BOLIVAR	5
42	CAMATAGUA	5
38	ROMULO GALLEGOS	4
47	LIBERTADOR	5
46	JOSE RAFAEL REVENGA	5
48	MARIO BRICENO IRAGORRY	5
49	SAN CASIMIRO	5
50	SAN SEBASTIAN	5
51	SANTIANDO MARINO	5
52	SANTOS MICHELENA	5
53	SUCRE	5
54	TOVAR	5
55	URDANETA	5
58	OCUMARE DE LACOSTA DE ORO	5
60	ALBERTO ARVELO TORREALBA	6
61	ANTONIO JOSE DE SUCRE	6
62	ARISMENDI	6
63	BARINAS	6
64	BOLIVAR	6
65	CRUZ PAREDES	6
67	OBISPOS	6
68	PEDRAZA	6
69	ROJAS	6
70	SOSA	6
71	ANDRES ELOY BLANCO	6
73	CARONI	7
74	CEDEÑO	7
75	EL CALLAO	7
76	GRAN SABANA	7
77	HERES	7
78	PIAR	7
79	REUL LEONI	7
80	ROSCIO	7
85	BEJUMA	8
81	SIFONTES	7
86	CARLOS ARVELO	8
87	DIEGO IBARRA	8
88	GUACARA	8
89	JUAN JOSE MORA	8
90	LIBERTADOR	8
91	LOS GUAYOS	8
92	MIRANDA	8
94	NAGUANAGUA 	8
95	PUERTO CABELLO	8
96	SAN DIEGO	8
97	SAN JOAQUIN	8
98	VALENCIA	8
100	ANZOATEGUI	9
101	FALCON	9
102	GIRARDOT	9
103	LIMA BLANCO	9
105	RICAURTE	9
106	ROMULO GALLEGOS	9
107	SAN CARLOS	9
108	TINACO	9
111	CASACIOMA	10
112	PEDERNALES	10
113	TUCUPITA	10
115	ACOSTA	11
116	BOLIVAR	11
117	BUCHIVACOA	11
118	CACIQUE MANAURE	11
119	CARIRUBANA	11
120	COLINA	11
121	DABAJURO	11
122	DEMOCRACIA	11
123	FALCON	11
124	FEDERACION	11
125	JACURA	11
127	MAUROA	11
128	MIRANDA	11
130	PALMASOLA	11
131	PETIT	11
132	PIRITU	11
133	SAN FRANCISCO	11
134	SILVA	11
135	SUCRE	11
136	TOCOPERO	11
137	UNION	11
138	URUMACO	11
139	ZAMORA	11
141	CAMAGUAN	12
143	EL SOCORRO	12
145	LEONARDO INFANTE	12
146	LAS MERCEDES	12
147	JULIAN MELLADO	12
168	ANDRES BELLO	14
169	ANTONIO PINTO SALINAS	14
170	ARICAGUA	14
172	CAMPO ELIAS	14
171	ARZOBISPO CHACON	14
174	CARDENAL QUINTERO	14
175	GUARAQUE	14
176	JULIO CESAR SALAS	14
177	JUSTO BRICEÑO	14
178	LIBERTADOR	14
179	MIRANDA	14
180	OBISPO RAMOS DE LORA	14
181	PADRE NOGUERA	14
183	RANGEL	14
182	PUEBO LLANO	14
184	RIVAS DAVILA	14
186	SUCRE	14
187	TOVAR	14
4	AUTONOMO ATABAPO	2
43	GIRARDOT	5
56	ZAMORA	5
66	EZEQUIEL ZAMORA	6
82	SUCRE	7
93	MONTALBAN	8
104	PAO DE SAN JUAN BAUTISTA	9
126	LOS TEQUES	11
142	CHAGUARAMAS	12
148	FRANCISCO DE MIRANDA	12
149	JOSE TADEO MONAGAS	12
150	ORTIZ	12
151	JOSE FELIZ RIBAS	12
152	JUAN GERMAN ROSCIO	12
153	SAN JOSE DE GUARIBE	12
154	SANTA MARIA DE IPIRE	12
155	PEDRO ZARAZA	12
157	ANDRES ELOY BLANCO	13
158	CRESPO	13
159	IRIBARREN	13
160	JIMENEZ	13
161	MORAN	13
162	PALAVECINO	13
164	TORRES	13
165	URDANETA	13
167	ALBERTO ADRIANI	14
173	CARACCIOLO PARRAOLMEDO	14
192	ANDRES BELLO	15
203	LOS SALIAS	15
204	PAEZ	15
205	PAZ CASTILLO	15
206	PEDRO GUAL	15
207	PLAZA	15
208	SIMON BOLIVAR	15
209	SUCRE	15
210	URDANETA	15
211	ZAMORA	15
213	ACOSTA	16
214	AGUASAY	16
215	BOLIVAR	16
216	CARIPE	16
217	CEDEÑO	16
219	LIBERTADOR	16
220	MATURIN	16
221	PIAR	16
222	PUNCERES	16
223	SANTA BARBARA	16
224	SOTILLO	16
225	URACOA	16
227	ANTOLIN DEL CAMPO	17
228	ARISMENDI	17
229	DIAZ	17
230	GARCIA	17
231	GOMEZ	17
232	MANEIRO	17
234	MARINO	17
235	PENINSULA DE MACANAO	17
236	TUBORES	17
237	VILLALBA	17
239	AGUA BLANCA	18
240	ARAURE	18
241	ESTELLER	18
242	GUANARE	18
244	MONSEÑOR JOSE VICENTE DE UNDA	18
245	OSPINO	18
246	PAEZ	18
247	PAPELON	18
248	SAN GENARO DE BOCONOITO	18
249	SAN RAFAEL DE ONOTO	18
250	SANTA ROSALIA	18
251	SUCRE	18
252	TUREN	18
254	ANDRES ELOY BLANCO	19
255	ANDRES MARA	19
256	ARISMENDI	19
257	BENITEZ	19
259	BOLIVAR	19
260	CAJIGAL	19
261	CRUZ SALMERON ACOSTA	19
262	LIBERTADOR	19
263	MARINO	19
264	MEJIA	19
265	MONTES	19
266	RIBERO	19
267	SUCRE	19
268	VALDEZ	19
270	ANDRES BELLO	20
272	AYACUCHO	20
273	BOLIBAR	20
274	CARDENAS	20
275	CORDOBA	20
276	FRENANDEZ FEO	20
277	FRANCISCO DE MIRANDA	20
278	GARCIA DE HEVIA	20
279	GUASIMOS	20
280	INDEPENDENCIA	20
281	JAUREGUI	20
282	JOSE MARIA VARGAS	20
283	JUNIN	20
284	LIBERTAD	20
285	LIBERTADOR	20
286	LOBATERA	20
287	MICHELENA	20
289	PEDRO MARIA URENA	20
290	RAFAEL URDANETA	20
291	SAMUEL DARIO MALDONADO	20
292	SAN CRISTOBAL	20
293	SEBORUCO	20
294	SIMON RODRIGUEZ	20
295	SUCRE	20
296	TORBES	20
297	URIBANTE	20
298	SAN JUDAS TADEO	20
300	ANDRES BELLO	21
301	BOCONO	21
302	BOLIVAR	21
303	CANDELARIA	21
304	CARACHE	21
305	ESCUQUE	21
307	JUAN VICENTE CAMPO ELIAS	21
308	LA CEIBA	21
309	MIRANDA	21
310	MONTE CARMELO	21
311	MOTATAN	21
312	PAMPAN	21
313	PAMPANITO	21
314	RAFAEL RANGEL	21
315	SAN RAFAEL DE CARVAJAL	21
316	SUCRE	21
317	TRUJILLO	21
318	URDANETA	21
319	VALERA	21
2	LIBERTADOR	1
3	AUTONOMO ALTO ORINOCO	2
8	AUTONOMO MANAPIARE	2
22	MANUEL EZEQUIEL BRUZUAL	3
25	SAN JOSE DE GUANIPA	3
44	JOSE ANGEL LAMAS	5
57	FRANCISO LINARES ALCANTARA	5
83	PADRE PEDRO CHIEN	7
110	ANTONIO DIAZ	10
129	MONSEÑOR ITURRIZA	11
144	SAN GERONIMO DE GUAYABAL	12
163	SIMON PLANAS	13
185	SANTOS MARQUINA	14
188	TULIO FEBRES CORDERO	14
189	ZEA	14
191	ACEVEDO	15
193	BARUTA	15
194	BRION	15
195	BUROZ	15
196	CARRIZAL	15
197	CHACAO	15
198	CISTOBAL ROJAS	15
199	EL HATILLO	15
200	GUAICAIPURO	15
201	INDENPENDENCIA	15
202	LANDER	15
218	EZEQUIEL ZAMORA	16
233	MARCANO	17
243	GUANARITO	18
258	DERMUDEZ	19
271	ANTONIO ROMULO COSTA	20
288	PANAMERICANO	20
306	JOSE FELIPE MARQUEZ CAÑIZALES	21
321	ARISTIDES BASTIDAS	22
322	BOLIVAR	22
323	BRUZUAL	22
324	COCOROTE	22
325	INDEPENDENCIA	22
326	JOSE ANTONIO PAEZ	22
327	LA TIRINIDAD	22
328	MANUEL MONGE	22
329	NIRGUA	22
330	PENA	22
331	SAN FELIPE	22
332	SUCRE	22
333	URACHICHE	22
334	VEROES	22
336	ALMIRANTE PADILLA	23
337	BARALT	23
338	CABIMAS	23
339	CATATUMBO	23
340	COLON	23
341	FRANCISCO JAVIER PULGAR	23
342	JESUS ENRIQUE lossada LOSSADA	23
343	JESUS MARIA SEMPRUN	23
344	LA CANADA DE URDANETA	23
345	LAGUNILLAS	23
346	MACHIQUES DE PERIJA	23
347	MARA	23
348	MARACAIBO	23
349	MIRANDA	23
350	PAEZ	23
351	ROSARIO DE PERIJA	23
352	SAN FRANCISCO	23
353	SANTA RITA	23
354	SIMON BOLIVAR	23
355	SUCRE	23
356	VALMORE RODRIGUEZ	23
358	VARGAS	24
359	NO EXISTE	25
\.


--
-- TOC entry 3191 (class 0 OID 41177)
-- Dependencies: 220
-- Data for Name: parroquias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.parroquias (id_parroquia, descripcion, id_municipio) FROM stdin;
1	URBANA LAS DELICIAS	43
2	URBANA MADRE MARIA DE SAN JOSE	43
3	URBANA JOAQUIN CRESPO	43
4	URBANA PEDRO JOSE OVALLES	43
5	URBANA JOSE CASANOVA GODOY	43
6	URBANA ANDRES ELOY BLANCO	43
7	URBANA LOS TACARIGUAS	43
8	JOSE ANGEL LAMAS	44
9	SANTA CRUZ	44
10	JOSE FELIX RIBAS	45
11	CASTOR NIEVES RIOS	45
12	NO URBANA LAS GUACAMAYAS	45
13	NO URBANA PAO DE ZARATE	45
14	NO URBANA ZUATA	45
15	LA VICTORIA	45
16	ANTIMANO	2
17	CANDELARIA	2
18	CARICUAO	2
19	CATEDRAL	2
20	COCHE	2
21	EL JUNQUITO	2
22	EL PARAISO	2
23	EL RECREO	2
24	LA PASTORA	2
25	LA VEGA	2
26	MACARAO	2
27	SAN AGUSTIN	2
28	SAN BERNARDINO	2
29	SAN JOSE	2
30	SAN JUAN	2
31	SAN PEDRO	2
32	SANTA ROSALIA	2
33	SANTA TERESA	2
34	SUCRE	2
35	ALTO ORINOCO	3
36	HUACHAMACARE	3
37	MARAWAKA	3
38	MAVACA	3
39	SIERRA PARIMA	3
40	LA ESMERALDA	3
41	UCATA	4
42	YAPACANA	4
43	CANAME	4
44	FERNANDO GIRON TOVAR	5
45	LUIS ALBERTO GOMEZ	5
46	PARHUENA	5
47	PLATANILLAL	5
48	SAMARIAPO	6
49	SIPAPO	6
50	MUNDUAPO	6
51	GUAYAPO	6
52	ISLA RATON	6
53	VICTORINO	7
54	CUMUNIDAD	7
55	MAROA	7
56	ALTO VENTUARI	8
57	MEDIO VENTUARI	8
58	BAJO VENTUARI	8
59	RIO NEGRO	9
60	SOLANO	9
61	CASIQUIARE	9
62	COCUY	9
63	SAN CARLOS DE RIO NEGRO	9
64	ANACO	11
65	SAN JOAQUIN	11
66	ARAGUA	12
67	CACHIPO	12
68	FERNANDO DE PENALVER	13
69	SAN MIGUEL	13
70	SUCRE	13
71	PUERTO PIRITU	13
72	SANTA BARBARA	14
73	FRANCISCO DE MIRANDA	15
74	ATAPIRIRE	15
75	BOCA DE PAO	15
76	EL PAO	15
77	MUCURA	15
78	PARIAGUAN	15
79	GUANTA	16
80	CHORRERON	16
81	INDEPENDENCIA	17
82	MAMO	17
83	SOLEDAD	17
84	PUERTO LA CRUZ	18
85	POZUELOS	18
86	ONOTO	19
87	SAN PABLO	19
88	PIAR	20
89	SAN DIEGO DE CABRUTICA	20
90	SANTA CLARA	20
91	UVERITO	20
92	ZUATA	20
93	MAPIRE	20
94	LIBERTAD	21
95	EL CARITO	21
96	SANTA INES	21
97	SAN MATEO	21
98	CLARINES	22
99	GUANAPE	22
100	PEDRO MARIA FREITES	23
101	LIBERTADOR	23
102	SANTA ROSA	23
103	URICA	23
104	CANTAURA	23
105	PIRITU	24
106	SAN FRANCISCO	24
107	SAN JOSE DE GUANIPA	25
108	BOCA DE UCHIRE	26
109	BOCA DE CHAVEZ	26
110	SANTA ANA	27
111	PUEBLO NUEVO	27
112	EL CARMEN	28
113	SAN CRISTOBAL	28
114	BERGANTIN	28
115	CAIGUA	28
116	NARICUAL	28
117	EDMUNDO BARRIOS	29
118	MIGUEL OTERO SILVA	29
119	EL CHAPARRO	30
120	TOMAS ALFARO CALATRAVA	30
121	LECHERIAS	31
122	EL MORRO	31
123	URBANA ACHAGUAS	33
124	APURITO	33
125	EL YAGUAL	33
126	MUCURITAS	33
127	QUESERAS DEL MEDIO	33
128	URBANA BIRUACA	34
129	URBANA BRUZUAL	35
130	MANTECAL	35
131	QUINTERO	35
132	RINCON HONDO	35
133	SAN VICENTE	35
134	URBANA GUASDUALITO	36
135	ARAMENDI	36
136	EL AMPARO	36
137	URDANETA	36
138	URBANA SAN JUAN DE PAYARA	37
139	CODAZZI	37
140	URBANA ELORZA	38
141	URBANA ELORZA	37
142	LA TRINIDAD	38
143	URBANA SAN FERNANDO	39
144	EL RECREO	39
145	JOSE RAFAEL REVENGA	46
146	EL CONSEJO	46
147	LIBERTADOR	47
148	NO URBANA SAN MARTIN DE PORRES	47
149	PALO NEGRO	47
150	MARIO BRICENO IRAGORRY	48
151	CANA DE AZUCAR	48
152	EL LIMON	48
153	SAN CASIMIRO	49
154	NO URBANA GÜIRIPA	49
155	NO URBANA OLLAS DE CARAMACATE	49
156	NO URBANA VALLE MORIN	49
157	SAN SEBASTIAN	50
158	SANTIAGO MARINO	51
159	AREVALO APONTE	51
160	NO URBANA CHUAO	51
161	NO URBANA SAMAN DE GÜERE	51
162	NO URBANA ALFREDO PACHECO MIRANDA	51
163	TURMERO	51
164	SANTOS MICHELENA	52
165	NO URBANA TIARA	52
166	LAS TEJERIAS	52
167	SUCRE	53
168	NO URBANA BELLA VISTA	53
169	CAGUA	53
170	TOVAR	54
171	LA COLONIA TOVAR	54
172	URDANETA	55
173	NO URBANA LAS PENITAS	55
174	NO URBANA SAN FRANCISCO DE CARA	55
175	NO URBANA TAGUAY	55
176	BARBACOAS	55
177	ZAMORA	56
178	NO URBANA MAGDALENO	56
179	NO URBANA SAN FRANCISCO DE ASIS	56
180	NO URBANA VALLES DE TUCUTUNEMO	56
181	NO URBANA AUGUSTO MIJARES	56
182	VILLA DE CURA	56
183	FRANCISCO LINARES ALCANTARA	57
184	NO URBANA FRANCISCO DE MIRANDA	57
185	NO URBANA MONSENOR FELICIANO GONZALEZ	57
186	SANTA RITA	57
187	OCUMARE DE LA COSTA DE ORO	58
188	SABANETA	60
189	RODRIGUEZ DOMINGUEZ	60
190	TICOPORO	61
191	ANDRES BELLO	61
192	NICOLAS PULIDO	61
193	ARISMENDI	62
194	GUADARRAMA	62
195	LA UNION	62
196	SAN ANTONIO	62
197	BARINAS	63
198	ALFREDO ARVELO LARRIVA	63
199	SAN SILVESTRE	63
200	SANTA INES	63
201	SANTA LUCIA	63
202	TORUNOS	63
203	EL CARMEN	63
204	ROMULO BETANCOURT	63
205	CORAZON DE JESUS	63
206	RAMON IGNACIO MENDEZ	63
207	ALTO BARINAS	63
208	MANUEL PALACIO FAJARDO	63
209	JUAN ANTONIO RODRIGUEZ DOMINGUEZ	63
210	DOMINGA ORTIZ DE PAEZ	63
211	BARINITAS	64
212	ALTAMIRA	64
213	CALDERAS	64
214	BARRANCAS	65
215	EL SOCORRO	65
216	MASPARRITO	65
217	SANTA BARBARA	66
218	JOSE IGNACIO DEL PUMAR	66
219	PEDRO BRICENO MENDEZ	66
220	RAMON IGNACIO MENDEZ	66
221	OBISPOS	67
222	EL REAL	67
223	LA LUZ	67
224	LOS GUASIMITOS	67
225	CIUDAD BOLIVIA	68
226	IGNACIO BRICENO	68
227	JOSE FELIX RIBAS	68
228	PAEZ	68
229	LIBERTAD	69
230	DOLORES	69
231	PALACIOS FAJARDO	69
232	SANTA ROSA	69
233	CIUDAD DE NUTRIAS	70
234	EL REGALO	70
235	PUERTO DE NUTRIAS	70
236	SANTA CATALINA	70
237	SIMON BOLIVAR	70
238	EL CANTON	71
239	SANTA CRUZ DE GUACAS	71
240	PUERTO VIVAS	71
241	CACHAMAY	73
242	CHIRICA	73
243	DALLA COSTA	73
244	ONCE DE ABRIL	73
245	SIMON BOLIVAR	73
246	UNARE	73
247	UNIVERSIDAD	73
248	VISTA AL SOL	73
249	POZO VERDE	73
250	YOCOIMA	73
251	SECCION CAPITAL CEDENO	74
252	ALTAGRACIA	74
253	ASCENSION FARRERAS	74
254	GUANIAMO	74
255	LA URBANA	74
256	PIJIGUAOS	74
257	CAICARA DEL ORINOCO	74
258	EL CALLAO	75
259	PEDREGAL	122
260	SECCION CAPITAL GRAN SABANA	76
261	IKABARU	76
262	SANTA ELENA DE UAIREN	76
263	AGUA SALADA	77
264	CATEDRAL	77
265	JOSE ANTONIO PAEZ	77
266	LA SABANITA	77
267	MARHUANTA	77
268	VISTA HERMOSA	77
269	ORINOCO	77
270	PANAPANA	77
271	ZEA	77
272	SECCION CAPITAL PIAR	78
273	ANDRES ELOY BLANCO	78
274	PEDRO COVA	78
275	UPATA	78
276	SECCION CAPITAL RAUL LEONI	79
277	BARCELONETA	79
278	SAN FRANCISCO	79
279	SANTA BARBARA	79
280	CIUDAD PIAR	79
281	SECCION CAPITAL ROSCIO	80
282	SALOM	80
283	GUASIPATI	80
284	SECCION CAPITAL SIFONTES	81
285	DALLA COSTA	81
286	SAN ISIDRO	81
287	TUMEREMO	81
288	SECCION CAPITAL SUCRE	82
289	ARIPAO	82
290	GUARATARO	82
291	LAS MAJADAS	82
292	MOITACO	82
293	MARIPA	82
294	PADRE PEDRO CHIEN	83
295	EL PALMAR	83
296	URBANA BEJUMA	85
297	NO URBANA CANOABO	85
298	NO URBANA SIMON BOLIVAR	85
299	URBANA GÜIGÜE	86
300	NO URBANA BELEN	86
301	NO URBANA TACARIGUA	86
302	URBANA AGUAS CALIENTES	87
303	URBANA MARIARA	87
304	URBANA CIUDAD ALIANZA	88
305	URBANA GUACARA	88
306	NO URBANA YAGUA	88
307	URBANA MORON	89
308	NO URBANA URAMA	89
309	URBANA TOCUYITO	90
310	URBANA INDEPENDENCIA	90
311	URBANA LOS GUAYOS	91
312	URBANA MIRANDA	92
313	URBANA MONTALBAN	93
314	URBANA NAGUANAGUA	94
315	URBANA BARTOLOME SALOM	95
316	URBANA DEMOCRACIA	95
317	URBANA FRATERNIDAD	95
318	URBANA GOAIGOAZA	95
319	URBANA JUAN JOSE FLORES	95
320	URBANA UNION	95
321	NO URBANA BORBURATA	95
322	NO URBANA PATANEMO	95
323	URBANA SAN DIEGO	96
324	URBANA SAN JOAQUIN	97
325	URBANA CANDELARIA	98
326	URBANA CATEDRAL	98
327	URBANA EL SOCORRO	98
328	URBANA MIGUEL PENA	98
329	URBANA RAFAEL URDANETA	98
330	URBANA SAN BLAS	98
331	URBANA SAN JOSE	98
332	URBANA SANTA ROSA	98
333	NO URBANA NEGRO PRIMERO	98
334	COJEDES	100
335	JUAN DE MATA SUAREZ	100
336	PARROQUIA TINAQUILLO	101
337	PARROQUIA EL BAUL	102
338	PARROQUIA SUCRE	102
339	PARROQUIA MACAPO	103
340	LA AGUADITA	103
341	EL PAO	104
342	LIBERTAD DE COJEDES	105
343	EL AMPARO	105
344	ROMULO GALLEGOS	106
345	SAN CARLOS DE AUSTRIA	107
346	JUAN ANGEL BRAVO	107
347	MANUEL MANRIQUE	107
348	GENERAL EN JEFE JOSE LAURENCIO SILVA	108
349	CURIAPO	110
350	ALMIRANTE LUIS BRION	110
351	FRANCISCO ANICETO LUGO	110
352	MANUEL RENAUD	110
353	PADRE BARRAL	110
354	SANTOS DE ABELGAS	110
355	IMATACA	111
356	CINCO DE JULIO	111
357	JUAN BAUTISTA ARISMENDI	111
358	MANUEL PIAR	111
359	ROMULO GALLEGOS	111
360	PEDERNALES	112
361	LUIS BELTRAN PRIETO FIGUEROA	112
362	SAN JOSE	113
363	JOSE VIDAL MARCANO	113
364	JUAN MILLAN	113
365	LEONARDO RUIZ PINEDA	113
366	MARISCAL ANTONIO JOSE DE SUCRE	113
367	MONSENOR ARGIMIRO GARCIA	113
368	SAN RAFAEL	113
369	VIRGEN DEL VALLE	113
370	SAN JUAN DE LOS CAYOS	115
371	CAPADARE	115
372	LA PASTORA	115
373	LIBERTADOR	115
374	SAN LUIS	116
375	ARACUA	116
376	LA PENA	116
377	CAPATARIDA	117
378	BARIRO	117
379	BOROJO	117
380	GUAJIRO	117
381	SEQUE	117
382	ZAZARIDA	117
383	CACIQUE MANAURE	118
384	CARIRUBANA	119
385	NORTE	119
386	PUNTA CARDON	119
387	SANTA ANA	119
388	LA VELA DE CORO	120
389	ACURIGUA	120
390	GUAIBACOA	120
391	LAS CALDERAS	120
392	MACORUCA	120
393	DABAJURO	121
394	AGUA CLARA	122
395	AVARIA	122
396	PIEDRA GRANDE	122
397	PURURECHE	122
398	PUEBLO NUEVO	123
399	ADICORA	123
400	BARAIVED	123
401	BUENA VISTA	123
402	JADACAQUIVA	123
403	MORUY	123
404	ADAURE	123
405	EL HATO	123
406	EL VINCULO	123
407	CHURUGUARA	124
408	AGUA LARGA	124
409	EL PAUJI	124
410	INDEPENDENCIA	124
411	MAPARARI	124
412	JACURA	125
413	AGUA LINDA	125
414	ARAURIMA	125
415	LOS TAQUES	126
416	JUDIBANA	126
417	MENE DE MAUROA	127
418	CASIGUA	127
419	SAN FELIX	127
420	SAN ANTONIO	128
421	SAN GABRIEL	128
422	SANTA ANA	128
423	GUZMAN GUILLERMO	128
424	MITARE	128
425	RIO SECO	128
426	SABANETA	128
427	CHICHIRIVICHE	129
428	BOCA DE TOCUYO	129
429	TOCUYO DE LA COSTA	129
430	PALMASOLA	130
431	CABURE	131
432	COLINA	131
433	CURIMAGUA	131
434	PIRITU	132
435	SAN JOSE DE LA COSTA	132
436	SAN FRANCISCO	133
437	TUCACAS	134
438	BOCA DE AROA	134
439	SUCRE	135
440	PECAYA	135
441	TOCOPERO	136
442	SANTA CRUZ DE BUCARAL	137
443	EL CHARAL	137
444	LAS VEGAS DEL TUY	137
445	URUMACO	138
446	BRUZUAL	138
447	PUERTO CUMAREBO	139
448	LA CIENAGA	139
449	LA SOLEDAD	139
450	PUEBLO CUMAREBO	139
451	ZAZARIDA	139
452	CAMAGUAN	141
453	PUERTO MIRANDA	141
454	UVERITO	141
455	CHAGUARAMAS	142
456	EL SOCORRO	143
457	SAN GERONIMO DE GUAYABAL	144
458	CAZORLA	144
459	VALLE DE LA PASCUA	145
460	ESPINO	145
461	LAS MERCEDES	146
462	CABRUTA	146
463	SANTA RITA DE MANAPIRE	146
464	EL SOMBRERO	147
465	SOSA	147
466	CALABOZO	148
467	EL CALVARIO	148
468	EL RASTRO	148
469	GUARDATINAJAS	148
470	ALTAGRACIA DE ORITUCO	149
471	LEZAMA	149
472	LIBERTAD DE ORITUCO	149
473	PASO REAL DE MACAIRA	149
474	SAN FRANCISCO DE MACAIRA	149
475	SAN RAFAEL DE ORITUCO	149
476	SOUBLETTE	149
477	ORTIZ	150
478	SAN FRANCISCO DE TIZNADOS	150
479	SAN JOSE DE TIZNADOS	150
480	SAN LORENZO DE TIZNADOS	150
481	TUCUPIDO	151
482	SAN RAFAEL DE LAYA	151
483	SAN JUAN DE LOS MORROS	152
484	CANTAGALLO	152
485	PARAPARA	152
486	SAN JOSE DE GUARIBE	153
487	SANTA MARIA DE IPIRE	154
488	ALTAMIRA	154
489	ZARAZA	155
490	SAN JOSE DE UNARE	155
491	PIO TAMAYO	157
492	QUEBRADA HONDA DE GUACHE	157
493	YACAMBU	157
494	FREITEZ	158
495	JOSE MARIA BLANCO	158
496	CATEDRAL	159
497	CONCEPCION	159
498	EL CUJI	159
499	JUAN DE VILLEGAS	159
500	SANTA ROSA	159
501	TAMACA	159
502	UNION	159
503	AGUEDO FELIPE ALVARADO	159
504	BUENA VISTA	159
505	JUAREZ	159
506	JUAN BAUTISTA RODRIGUEZ	160
507	CUARA	160
508	DIEGO DE LOZADA	160
509	PARAISO DE SAN JOSE	160
510	SAN MIGUEL	160
511	TINTORERO	160
512	JOSE BERNARDO DORANTE	160
513	CORONEL MARIANO PERAZA	160
514	BOLIVAR	161
515	ANZOATEGUI	161
516	GUARICO	161
517	HILARIO LUNA Y LUNA	161
518	HUMOCARO ALTO	161
519	HUMOCARO BAJO	161
520	LA CANDELARIA	161
521	MORAN	161
522	CABUDARE	162
523	JOSE GREGORIO BASTIDAS	162
524	AGUA VIVA	162
525	SARARE	163
526	BURIA	163
527	GUSTAVO VEGAS LEON	163
528	TRINIDAD SAMUEL	164
529	ANTONIO DIAZ	164
530	CAMACARO	164
531	CASTANEDA	164
532	CECILIO ZUBILLAGA	164
533	CHIQUINQUIRA	164
534	EL BLANCO	164
535	ESPINOZA DE LOS MONTEROS	164
536	LARA	164
537	LAS MERCEDES	164
538	MANUEL MORILLO	164
539	MONTANA VERDE	164
540	MONTES DE OCA	164
541	TORRES	164
542	HERIBERTO ARROYO	164
543	REYES VARGAS	164
544	ALTAGRACIA	164
545	SIQUISIQUE	165
546	MOROTURO	165
547	SAN MIGUEL	165
548	XAGUAS	165
549	PRESIDENTE BETANCOURT	167
550	PRESIDENTE PAEZ	167
551	PRESIDENTE ROMULO GALLEGOS	167
552	GABRIEL PICON GONZALEZ	167
553	HECTOR AMABLE MORA	167
554	JOSE NUCETE SARDI	167
555	PULIDO MENDEZ	167
556	ANDRES BELLO	168
557	ANTONIO PINTO SALINAS	169
558	MESA BOLIVAR	169
559	MESA DE LAS PALMAS	169
560	ARICAGUA	170
561	SAN ANTONIO	170
562	ARZOBISPO CHACON	171
563	CAPURI	171
564	CHACANTA	171
565	EL MOLINO	171
566	GUAIMARAL	171
567	MUCUTUY	171
568	MUCUCHACHI	171
569	FERNANDEZ PENA	172
570	MATRIZ	172
571	MONTALBAN	172
572	ACEQUIAS	172
573	JAJI	172
574	LA MESA	172
575	SAN JOSE DEL SUR	172
576	CARACCIOLO PARRA OLMEDO	173
577	FLORENCIO RAMIREZ	173
578	CARDENAL QUINTERO	174
579	LAS PIEDRAS	174
580	GUARAQUE	175
581	MESA DE QUINTERO	175
582	RIO NEGRO	175
583	JULIO CESAR SALAS	176
584	JUSTO BRICENO	177
585	SAN CRISTOBAL DE TORONDOY	177
586	ANTONIO SPINETTI DINI	178
587	ARIAS	178
588	CARACCIOLO PARRA PEREZ	178
589	DOMINGO PENA	178
590	EL LLANO	178
591	GONZALO PICON FEBRES	178
592	JACINTO PLAZA	178
593	JUAN RODRIGUEZ SUAREZ	178
594	LASSO DE LA VEGA	178
595	MARIANO PICON SALAS	178
596	MILLA	178
597	OSUNA RODRIGUEZ	178
598	SAGRARIO	178
599	EL MORRO	178
600	LOS NEVADOS	178
601	MIRANDA	179
602	ANDRES ELOY BLANCO	179
603	LA VENTA	179
604	PINANGO	179
605	OBISPO RAMOS DE LORA	180
606	ELOY PAREDES	180
607	SAN RAFAEL DE ALCAZAR	180
608	PADRE NOGUERA	181
609	PUEBLO LLANO	182
610	RANGEL	183
611	CACUTE	183
612	LA TOMA	183
613	MUCURUBA	183
614	SAN RAFAEL	183
615	RIVAS DAVILA	184
616	GERONIMO MALDONADO	184
617	SANTOS MARQUINA	185
618	SUCRE	186
619	CHIGUARA	186
620	ESTANQUEZ	186
621	LA TRAMPA	186
622	PUEBLO NUEVO DEL SUR	186
623	SAN JUAN	186
624	EL AMPARO	187
625	EL LLANO	187
626	SAN FRANCISCO	187
627	TOVAR	187
628	TULIO FEBRES CORDERO	188
629	INDEPENDENCIA	188
630	MARIA DE LA CONCEPCION PALACIOS BLANCO	188
631	SANTA APOLONIA	188
632	ZEA	189
633	CANO EL TIGRE	189
634	CAUCAGUA	191
635	ARAGÜITA	191
636	AREVALO GONZALEZ	191
637	CAPAYA	191
638	EL CAFE	191
639	MARIZAPA	191
640	PANAQUIRE	191
641	RIBAS	191
642	SAN JOSE DE BARLOVENTO	192
643	CUMBO	192
644	BARUTA	193
645	EL CAFETAL	193
646	LAS MINAS DE BARUTA	193
647	HIGUEROTE	194
648	CURIEPE	194
649	TACARIGUA	194
650	MAMPORAL	195
651	CARRIZAL	196
652	CHACAO	197
653	CHARALLAVE	198
654	LAS BRISAS	198
655	EL HATILLO	199
656	LOS TEQUES	200
657	ALTAGRACIA DE LA MONTANA	200
658	CECILIO ACOSTA	200
659	EL JARILLO	200
660	PARACOTOS	200
661	SAN PEDRO	200
662	TACATA	200
663	SANTA TERESA DEL TUY	201
664	EL CARTANAL	201
665	OCUMARE DEL TUY	202
666	LA DEMOCRACIA	202
667	SANTA BARBARA	202
668	SAN ANTONIO DE LOS ALTOS	203
669	RIO CHICO	204
670	EL GUAPO	204
671	TACARIGUA DE LA LAGUNA	204
672	PAPARO	204
673	SAN FERNANDO DEL GUAPO	204
674	SANTA LUCIA	205
675	CUPIRA	206
676	MACHURUCUTO	206
677	GUARENAS	207
678	SAN FRANCISCO DE YARE	208
679	SAN ANTONIO DE YARE	208
680	PETARE	209
681	CAUCAGÜITA	209
682	FILA DE MARICHES	209
683	LA DOLORITA	209
684	LEONCIO MARTINEZ	209
685	CUA	210
686	NUEVA CUA	210
687	GUATIRE	211
688	BOLIVAR	211
689	ACOSTA	213
690	SAN FRANCISCO	213
691	AGUASAY	214
692	BOLIVAR	215
693	CARIPE	216
694	EL GUACHARO	216
695	LA GUANOTA	216
696	SABANA DE PIEDRA	216
697	SAN AGUSTIN	216
698	TERESEN	216
699	CEDENO	217
700	AREO	217
701	SAN FELIX	217
702	VIENTO FRESCO	217
703	EZEQUIEL ZAMORA	218
704	EL TEJERO	218
705	LIBERTADOR	219
706	CHAGUARAMAS	219
707	LAS ALHUACAS	219
708	TABASCA	219
709	MATURIN	220
710	ALTO DE LOS GODOS	220
711	BOQUERON	220
712	LAS COCUIZAS	220
713	SAN SIMON	220
714	SANTA CRUZ	220
715	EL COROZO	220
716	EL FURRIAL	220
717	JUSEPIN	220
718	LA PICA	220
719	SAN VICENTE	220
720	PIAR	221
721	APARICIO	221
722	CHAGUARAMAL	221
723	EL PINTO	221
724	GUANAGUANA	221
725	LA TOSCANA	221
726	TAGUAYA	221
727	PUNCERES	222
728	CACHIPO	222
729	SANTA BARBARA	223
730	SOTILLO	224
731	LOS BARRANCOS DE FAJARDO	224
732	URACOA	225
733	ANTOLIN DEL CAMPO	227
734	ARISMENDI	228
735	DIAZ	229
736	ZABALA	229
737	GARCIA	230
738	FRANCISCO FAJARDO	230
739	GOMEZ	231
740	BOLIVAR	231
741	GUEVARA	231
742	MATASIETE	231
743	SUCRE	231
744	MANEIRO	232
745	AGUIRRE	232
746	MARCANO	233
747	ADRIAN	233
748	MARINO	234
749	PENINSULA DE MACANAO	235
750	SAN FRANCISCO	235
751	TUBORES	236
752	LOS BARALES	236
753	VILLALBA	237
754	VICENTE FUENTES	237
755	AGUA BLANCA	239
756	ARAURE	240
757	RIO ACARIGUA	240
758	ESTELLER	241
759	UVERAL	241
760	GUANARE	242
761	CORDOBA	242
762	SAN JOSE DE LA MONTANA	242
763	SAN JUAN DE GUANAGUANARE	242
764	VIRGEN DE LA COROMOTO	242
765	GUANARITO	243
766	TRINIDAD DE LA CAPILLA	243
767	DIVINA PASTORA	243
768	MONSENOR JOSE VICENTE DE UNDA	244
769	PENA BLANCA	244
770	OSPINO	245
771	APARICION	245
772	LA ESTACION	245
773	PAEZ	246
774	PAYARA	246
775	PIMPINELA	246
776	RAMON PERAZA	246
777	PAPELON	247
778	CANO DELGADITO	247
779	SAN GENARO DE BOCONOITO	248
780	ANTOLIN TOVAR	248
781	SAN RAFAEL DE ONOTO	249
782	SANTA FE	249
783	THERMO MORLES	249
784	SANTA ROSALIA	250
785	FLORIDA	250
786	SUCRE	251
787	CONCEPCION	251
788	SAN RAFAEL DE PALO ALZADO	251
789	UVENCIO ANTONIO VELASQUEZ	251
790	SAN JOSE DE SAGUAZ	251
791	VILLA ROSA	251
792	TUREN	252
793	CANELONES	252
794	SANTA CRUZ	252
795	SAN ISIDRO LABRADOR	252
796	MARINO	254
797	ROMULO GALLEGOS	254
798	SAN JOSE DE AEROCUAR	255
799	TAVERA ACOSTA	255
800	RIO CARIBE	256
801	ANTONIO JOSE DE SUCRE	256
802	EL MORRO DE PUERTO SANTO	256
803	PUERTO SANTO	256
804	SAN JUAN DE LAS GALDONAS	256
805	EL PILAR	257
806	EL RINCON	257
807	GENERAL FRANCISCO ANTONIO VASQUEZ	257
808	GUARAUNOS	257
809	TUNAPUICITO	257
810	UNION	257
811	BOLIVAR	258
812	MACARAPANA	258
813	SANTA CATALINA	258
814	SANTA ROSA	258
815	SANTA TERESA	258
816	BOLIVAR	259
817	YAGUARAPARO	260
818	EL PAUJIL	260
819	LIBERTAD	260
820	ARAYA	261
821	CHACOPATA	261
822	MANICUARE	261
823	TUNAPUY	262
824	CAMPO ELIAS	262
825	IRAPA	263
826	CAMPO CLARO	263
827	MARABAL	263
828	SAN ANTONIO DE IRAPA	263
829	SORO	263
830	MEJIA	264
831	CUMANACOA	265
832	ARENAS	265
833	ARICAGUA	265
834	COCOLLAR	265
835	SAN FERNANDO	265
836	SAN LORENZO	265
837	VILLA FRONTADO (MUELLE DE CARIACO)	266
838	CATUARO	266
839	RENDON	266
840	SANTA CRUZ	266
841	SANTA MARIA	266
842	ALTAGRACIA	267
843	AYACUCHO	267
844	SANTA INES	267
845	VALENTIN VALIENTE	267
846	SAN JUAN	267
847	RAUL LEONI	267
848	SANTA FE	267
849	GÜIRIA	268
850	BIDEAU	268
851	CRISTOBAL COLON	268
852	PUNTA DE PIEDRAS	268
853	ANDRES BELLO	270
854	ANTONIO ROMULO COSTA	271
855	AYACUCHO	272
856	RIVAS BERTI	272
857	SAN PEDRO DEL RIO	272
858	BOLIVAR	273
859	PALOTAL	273
860	JUAN VICENTE GOMEZ	273
861	ISAIAS MEDINA ANGARITA	273
862	CARDENAS	274
863	AMENODORO RANGEL LAMUS	274
864	LA FLORIDA	274
865	CORDOBA	275
866	FERNANDEZ FEO	276
867	ALBERTO ADRIANI	276
868	SANTO DOMINGO	276
869	FRANCISCO DE MIRANDA	277
870	GARCIA DE HEVIA	278
871	BOCA DE GRITA	278
872	JOSE ANTONIO PAEZ	278
873	GUASIMOS	279
874	INDEPENDENCIA	280
875	JUAN GERMAN ROSCIO	280
876	ROMAN CARDENAS	280
877	JAUREGUI	281
878	EMILIO CONSTANTINO GUERRERO	281
879	MONSENOR MIGUEL ANTONIO SALAS	281
880	JOSE MARIA VARGAS	282
881	JUNIN	283
882	LA PETROLEA	283
883	QUINIMARI	283
884	BRAMON	283
885	LIBERTAD	284
886	CIPRIANO CASTRO	284
887	MANUEL FELIPE RUGELES	284
888	LIBERTADOR	285
889	EMETERIO OCHOA	285
890	DORADAS	285
891	SAN JOAQUIN DE NAVAY	285
892	LOBATERA	286
893	CONSTITUCION	286
894	MICHELENA	287
895	PANAMERICANO	288
896	LA PALMITA	288
897	PEDRO MARIA URENA	289
898	NUEVA ARCADIA	289
899	RAFAEL URDANETA	290
900	SAMUEL DARIO MALDONADO	291
901	BOCONO	291
902	HERNANDEZ	291
903	LA CONCORDIA	292
904	PEDRO MARIA MORANTES	292
905	SAN JUAN BAUTISTA	292
906	SAN SEBASTIAN	292
907	DR. FRANCISCO ROMERO LOBO	292
908	SEBORUCO	293
909	SIMON RODRIGUEZ	294
910	SUCRE	295
911	ELEAZAR LOPEZ CONTRERAS	295
912	SAN PABLO	295
913	TORBES	296
914	URIBANTE	297
915	CARDENAS	297
916	JUAN PABLO PENALOZA	297
917	POTOSI	297
918	SAN JUDAS TADEO	298
919	SANTA ISABEL	300
920	ARAGUANEY	300
921	EL JAGÜITO	300
922	LA ESPERANZA	300
923	BOCONO	301
924	EL CARMEN	301
925	MOSQUEY	301
926	AYACUCHO	301
927	BURBUSAY	301
928	GENERAL RIVAS	301
929	GUARAMACAL	301
930	VEGA DE GUARAMACAL	301
931	MONSENOR JAUREGUI	301
932	RAFAEL RANGEL	301
933	SAN MIGUEL	301
934	SAN JOSE	301
935	SABANA GRANDE	302
936	CHEREGÜE	302
937	GRANADOS	302
938	CHEJENDE	303
939	ARNOLDO GABALDON	303
940	BOLIVIA	303
941	CARRILLO	303
942	CEGARRA	303
943	MANUEL SALVADOR ULLOA	303
944	SAN JOSE	303
945	CARACHE	304
946	CUICAS	304
947	LA CONCEPCION	304
948	PANAMERICANA	304
949	SANTA CRUZ	304
950	ESCUQUE	305
951	LA UNION	305
952	SABANA LIBRE	305
953	SANTA RITA	305
954	EL SOCORRO	306
955	ANTONIO JOSE DE SUCRE	306
956	LOS CAPRICHOS	306
957	CAMPO ELIAS	307
958	ARNOLDO GABALDON	307
959	SANTA APOLONIA	308
960	EL PROGRESO	308
961	LA CEIBA	308
962	TRES DE FEBRERO	308
963	EL DIVIDIVE	309
964	AGUA SANTA	309
965	AGUA CALIENTE	309
966	EL CENIZO	309
967	VALERITA	309
968	MONTE CARMELO	310
969	BUENA VISTA	310
970	SANTA MARIA DEL HORCON	310
971	MOTATAN	311
972	EL BANO	311
973	JALISCO	311
974	PAMPAN	312
975	FLOR DE PATRIA	312
976	LA PAZ	312
977	SANTA ANA	312
978	PAMPANITO	313
979	LA CONCEPCION	313
980	PAMPANITO II	313
981	BETIJOQUE	314
982	LA PUEBLITA	314
983	LOS CEDROS	314
984	JOSE GREGORIO HERNANDEZ	314
985	CARVAJAL	315
986	ANTONIO NICOLAS BRICENO	315
987	CAMPO ALEGRE	315
988	JOSE LEONARDO SUAREZ	315
989	SABANA DE MENDOZA	316
990	EL PARAISO	316
991	JUNIN	316
992	VALMORE RODRIGUEZ	316
993	ANDRES LINARES	317
994	CHIQUINQUIRA	317
995	CRISTOBAL MENDOZA	317
996	CRUZ CARRILLO	317
997	MATRIZ	317
998	MONSENOR CARRILLO	317
999	TRES ESQUINAS	317
1000	LA QUEBRADA	318
1001	CABIMBU	318
1002	JAJO	318
1003	LA MESA	318
1004	SANTIAGO	318
1005	TUNAME	318
1006	JUAN IGNACIO MONTILLA	319
1007	LA BEATRIZ	319
1008	MERCEDES DIAZ	319
1009	SAN LUIS	319
1010	LA PUERTA	319
1011	MENDOZA	319
1012	ARISTIDES BASTIDAS	321
1013	BOLIVAR	322
1014	BRUZUAL	323
1015	CAMPO ELIAS	323
1016	COCOROTE	324
1017	INDEPENDENCIA	325
1018	JOSE ANTONIO PAEZ	326
1019	LA TRINIDAD	327
1020	MANUEL MONGE	328
1021	NIRGUA	329
1022	SALOM	329
1023	TEMERLA	329
1024	PENA	330
1025	SAN ANDRES	330
1026	SAN FELIPE	331
1027	ALBARICO	331
1028	SAN JAVIER	331
1029	SUCRE	332
1030	URACHICHE	333
1031	VEROES	334
1032	EL GUAYABO	334
1033	PARROQUIA ISLA DE TOAS	336
1034	PARROQUIA MONAGAS	336
1035	SAN TIMOTEO	337
1036	GENERAL URDANETA	337
1037	LIBERTADOR	337
1038	MANUEL GUANIPA MATOS	337
1039	MARCELINO BRICENO	337
1040	PUEBLO NUEVO	337
1041	AMBROSIO	338
1042	CARMEN HERRERA	338
1043	GERMAN RIOS LINARES	338
1044	LA ROSA	338
1045	JORGE HERNANDEZ	338
1046	ROMULO BETANCOURT	338
1047	SAN BENITO	338
1048	ARISTIDES CALVANI	338
1049	PUNTA GORDA	338
1050	ENCONTRADOS	339
1051	UDON PEREZ	339
1052	SAN CARLOS DEL ZULIA	340
1053	MORALITO	340
1054	SANTA BARBARA	340
1055	SANTA CRUZ DEL ZULIA	340
1056	URRIBARRI	340
1057	SIMON RODRIGUEZ	341
1058	CARLOS QUEVEDO	341
1059	FRANCISCO JAVIER PULGAR	341
1060	LA CONCEPCION	342
1061	JOSE RAMON YEPES	342
1062	MARIANO PARRA LEON	342
1063	SAN JOSE	342
1064	JESUS MARIA SEMPRUN	343
1065	BARI	343
1066	CONCEPCION	344
1067	ANDRES BELLO	344
1068	CHIQUINQUIRA	344
1069	EL CARMELO	344
1070	POTRERITOS	344
1071	ALONSO DE OJEDA	345
1072	LIBERTAD	345
1073	CAMPO LARA	345
1074	ELEAZAR LOPEZ CONTRERAS	345
1075	VENEZUELA	345
1076	LIBERTAD	346
1077	BARTOLOME DE LAS CASAS	346
1078	RIO NEGRO	346
1079	SAN JOSE DE PERIJA	346
1080	SAN RAFAEL	347
1081	LA SIERRITA	347
1082	LAS PARCELAS	347
1083	LUIS DE VICENTE	347
1084	MONSENOR MARCOS SERGIO GODOY	347
1085	RICAURTE	347
1086	TAMARE	347
1087	ANTONIO BORJAS ROMERO	348
1088	BOLIVAR	348
1089	CACIQUE MARA	348
1090	CARACCIOLO PARRA PEREZ	348
1091	CECILIO ACOSTA	348
1092	CRISTO DE ARANZA	348
1093	COQUIVACOA	348
1094	CHIQUINQUIRA	348
1095	FRANCISCO EUGENIO BUSTAMANTE	348
1096	IDELFONSO VASQUEZ	348
1097	JUANA DE AVILA	348
1098	LUIS HURTADO HIGUERA	348
1099	MANUEL DAGNINO	348
1100	OLEGARIO VILLALOBOS	348
1101	RAUL LEONI	348
1102	SANTA LUCIA	348
1103	VENANCIO PULGAR	348
1104	SAN ISIDRO	348
1105	ALTAGRACIA	349
1106	ANA MARIA CAMPOS	349
1107	FARIA	349
1108	SAN ANTONIO	349
1109	SAN JOSE	349
1110	SINAMAICA	350
1111	ALTA GUAJIRA	350
1112	ELIAS SANCHEZ RUBIO	350
1113	GUAJIRA	350
1114	EL ROSARIO	351
1115	DONALDO GARCIA	351
1116	SIXTO ZAMBRANO	351
1117	SAN FRANCISCO	352
1118	EL BAJO	352
1119	DOMITILA FLORES	352
1120	FRANCISCO OCHOA	352
1121	LOS CORTIJOS	352
1122	MARCIAL HERNANDEZ	352
1123	SANTA RITA	353
1124	EL MENE	353
1125	JOSE CENOVIO URRIBARRI	353
1126	PEDRO LUCAS URRIBARRI	353
1127	MANUEL MANRIQUE	354
1128	RAFAEL MARIA BARALT	354
1129	RAFAEL URDANETA	354
1130	BOBURES	355
1131	EL BATEY	355
1132	GIBRALTAR	355
1133	HERAS	355
1134	MONSENOR ARTURO CELESTINO ALVAREZ	355
1135	ROMULO GALLEGOS	355
1136	LA VICTORIA	356
1137	RAFAEL URDANETA	356
1138	RAUL CUENCA	356
1139	CARABALLEDA	358
1140	CARAYACA	358
1141	CARUAO	358
1142	CATIA LA MAR	358
1143	EL JUNKO	358
1144	LA GUAIRA	358
1145	MACUTO	358
1146	MAIQUETIA	358
1147	NAIGUATA	358
1148	RAUL LEONI	358
1149	CARLOS SOUBLETTE	358
1150	CALABOZO	359
1152	ALTAGRACIA	2
1153	EL VALLE	2
1154	23 DE ENERO	2
1155	SAN FERNANDO DE ATABAPO	4
1156	SAN JUAN DE MANAPIARE	8
1157	VALLE DE GUANAPE	14
1158	JOSE GREGORIO MONAGAS	20
1159	SABANA DE UCHIRE	22
1160	EL PILAR	28
1161	GUACHARA	33
1162	SAN CAMILO	36
1163	PENALVER	39
1164	SAN RAFAEL DE ATAMAICA	39
1165	BOLIVAR	41
1166	SAN MATEO	41
1167	CAMATAGUA	42
1168	NO URBANA CARMEN DE CURA	42
1169	NO URBANA CHORONI	43
1170	CARAYA	335
1171	CARLOS SOUBLETTE	335
1172	CARUAO	335
1173	CATIA LA MAS	335
1174	EL JUNKO	335
1175	LA GUAIRA	335
1176	MACUTO	335
1177	MAIQUETIA	335
1178	NAIGUATA	335
1179	URIMARE	335
1180	NO EXITE	300
1181	CARABALLEDA	335
1196	ANTIMANO	2
1197	CANDELARIA	2
1198	CARICUAO	2
1199	CATEDRAL	2
1200	COCHE	2
1201	EL JUNQUITO	2
1202	EL PARAISO	2
1203	EL RECREO	2
1205	LA PASTORA	2
1206	LA VEGA	2
1207	MACARAO	2
1208	SAN AGUSTIN	2
1209	SAN BERNARDINO	2
1210	SAN JOSE	2
1211	SAN JUAN	2
1212	SAN PEDRO	2
1213	SANTA ROSALIA	2
1214	SANTA TERESA	2
1215	SUCRE	2
1216	23 DE ENERO	2
1219	HUACHAMACARE	3
1220	MARAWAKA	3
1221	MAVACA	3
1222	SIERRA PARIMA	3
1224	LA ESMERALDA	3
1225	UCATA	4
1226	YAPACANA	4
1227	CANAME	4
1229	SAN FERNANDO DE ATABAPO	4
1230	FERNANDO GIRON TOVAR	5
1232	PARHUENA	5
1233	PLATANILLAL	5
1235	SAMARIAPO	6
1236	SIPAPO	6
1237	MUNDUAPO	6
1238	GUAYAPO	6
1240	ISLA RATON	6
1241	VICTORINO	7
1242	COMUNIDAD	7
1244	MAROA	7
1245	ALTO VENTUARI	8
1246	MEDIO VENTUARI	8
1247	BAJO VENTUARI	8
1249	SAN JUAN DE MANAPIARE	8
1250	RIO NEGRO	9
1251	SOLANO	9
1253	COCUY	9
1255	SAN CARLOS DE RIO NEGRO	9
1256	ANACO	11
1257	SAN JOAQUIN	11
1259	ARAGUA	12
1260	CACHIPO	12
1262	FERNANDO DE PENALVER	13
1263	SAN MIGUEL	13
1264	SUCRE	13
1266	PUERTO PIRITU	13
1268	SANTA BARBARA	14
1270	FRANCISCO DE MIRANDA	15
1271	ATAPIRIRE	15
1272	BOCA DEL PAO	15
1273	EL PAO	15
1274	MUCURA	15
1276	PARIAGUAN	15
1277	GUANTA	16
1278	CHORRERON	16
1280	INDEPENDENCIA	17
1281	MAMO	17
1283	SOLEDAD	17
1284	PUERTO LA CRUZ	18
1285	POZUELOS	18
1287	ONOTO	19
1288	SAN PABLO	19
1291	PIAR	20
1292	SAN DIEGO DE CABRUTICA	20
1293	SANTA CLARA	20
1294	UVERITO	20
1295	ZUATA	20
1297	MAPIRE	20
1298	LIBERTAD	21
1299	EL CARITO 	21
1300	SANTA INES	21
1302	SAN MATEO	21
1303	CLARINES	22
1304	GUANAPE	22
1307	PEDRO MARIA FREITES	23
1308	LIBERTADOR	23
1309	SANTA ROSA	23
1310	URICA	23
1312	CANTAURA	23
1313	PIRITU	24
1314	SAN FRANCISCO	24
1316	SAN JOSE DE GUANIPA	25
1318	BOCA DE UCHIRE	26
1319	BOCA DE CHAVEZ	26
1321	SANTA ANA	27
1322	PUEBLO NUEVO	27
1324	EL CARMEN	28
1325	SAN CRISTOBAL	28
1326	BERGANTIN	28
1327	CAIGUA	28
1329	NARICUAL	28
1331	EDMUNDO BARRIOS	29
1334	EL CHAPARRO	30
1332	MIGUEL OTERO SILVA	29
1335	TOMAS ALFARO CALATRAVA	30
1337	LECHERIAS	31
1338	EL MORRO	31
1340	URBANA ACHAGUAS	33
1341	APURITO	33
1342	EL YAGUAL	33
1343	GUACHARA	33
1344	MUCURITAS	33
1347	URBANA BIRUACA	34
1349	URBANA BRUZUAL	35
1350	MANTECAL	35
1351	QUINTERO	35
1353	SAN VICENTE	35
1352	RINCON HONDO	35
1355	URBANA GUASDUALITO	36
1356	ARAMENDI	36
1357	EL AMPARO	36
1358	SAN CAMILO	36
1359	USRDANETA	36
1362	CODAZZI	37
1363	CUNAVICHE	37
1365	URBANA ELORZA	38
1366	LA TRINIDAD	38
1368	URBANA SAN FERNANDO	39
1369	EL RECREO	39
1370	PENALVER	39
1371	SAN RAFAEL DE ATAMAICA	39
1373	BOLIVAR	41
1375	SAN MATEO	41
1376	CAMATAGUA	42
1377	NO URBANA CARMEN DE CURA	42
1392	CASTOR NIEVES RIOS	45
1393	NO URBANA LAS GUACAMAYAS	45
1395	NO URBANA ZUATA	45
1394	NO URBANA PAO DE ZARATE	45
1397	LA VICTORIA	45
1400	EL CONSEJO	46
1398	JOSE RAFAEL REVENGA	46
1401	LIBERTADOR	47
1402	NO URBANA SAN MARTIN DE PORRES	47
1404	PALO NEGRO	47
1405	MARIO BRISEÑO IRAGORRY	48
1406	CAÑA DE AZUCAR	48
1408	EL LIMON	48
1409	SAN CASIMIRO	49
1411	NO URBANA OLLAS DE CARAMACATE	49
1412	NO URBANA VALLE MORIN	49
1414	SAN SEBASTIAN	50
1416	SANTIAGO MARIÑO	51
1418	NO URBANA CHUAO	51
1417	AREVALO APONTE	51
1419	NO URBANA SAMAN DE GÜERE	51
1422	TERMERO	51
1423	SANTOS MICHELENA	52
1424	NO URBANA TIARA	52
1426	LAS TEJERIAS	52
1427	SUCRE	53
1428	NO URBANA BELLA VISTA	53
1430	CAGUA	53
1431	TOVAR	54
1433	LA COLONIA TOVAR	54
1434	URDANETA	55
1435	NO URBANA LAS PENITAS	55
1437	NO URBANA TAGUAY	55
1436	NO URBANA SAN FRANCISCO DE CARA	55
1439	BARBACOAS	55
1440	ZAMORA	56
1441	NO URBANA MAGDALENO	56
1442	NO URBANA SAN FRANCISCO DE ASIS	56
1443	NO URBANA VALLES DE TUCUTUNEMO	56
1444	NO URBANA AUGUSTO MIJARES	56
1446	VILLA DE CURA	56
1448	NO URBANA FRANCISCO DE MIRANDA	57
1449	NO URBANA MONSEÑOR FELICIANO GONZALEZ	57
1451	SANTA RITA	57
1452	OCUMARE DE LA COSTA DE ORO	58
1454	SABANETA	60
1455	RODRIGUEZ DOMINGUEZ	60
1457	TICOPORO	61
1458	ANDRES BELLO 	61
1459	NICOLAS PULIDO	61
1461	ARISMENDI	62
1462	GUADARRAMA	62
1463	LA UNION	62
1464	SAN ANTONIO	62
1466	BARINAS	63
1467	ALFREDO ARVELO LARRIVA	63
1468	SAN SILVESTRE	63
1469	SANTA INES	63
1470	SANTA LUCIA	63
1471	TORUNOS	63
1473	ROMULO BETANCOURT	63
1474	CORAZON DE JESUS	63
1475	RAMON IGNACIO MENDEZ	63
1476	ALTO BARINAS	63
1477	MANUEL PALACIO FAJARDO	63
1479	DOMINGA ORTIZ DE PAEZ	63
1478	JUAN ANTONIO RODRIGUEZ DOMINGUEZ	63
1481	BARINITAS	64
1482	ALTAMIRA	64
1485	BARRANCAS	65
1483	CALDERAS	64
1486	EL SOCORRO	65
1489	SANTA BARBARA	66
1490	JOSE IGNACIO DEL PUMAR	66
1491	PEDRO BRICEÑO MENDEZ	66
1492	RAMON IGNACIO MENDEZ	66
1494	OBISPOS	67
1495	EL REAL	67
1496	LA LUZ	67
1497	LOS GUASIMITOS	67
1499	CIUDAD BOLIVIA	68
1509	CIUDAD DE NUTRIAS	70
1502	PAEZ	68
1504	LIBERTAD	69
1505	DOLORES	69
1506	PALACIOS FAJARDO	69
1507	SANTA ROSA	69
1500	IGNACIO BRICEÑO	68
1510	EL REGALO	70
1511	PUERTO DE NUTRIAS	70
1512	SANTA CATALINA	70
1514	SIMON BOLIVAR	70
1515	EL CANTON	71
1516	SANTA CRUZ DE GUACAS	71
1517	PUERTO VIVAS	71
1519	CACHAMAY	73
1520	CHIRICA	73
1522	ONCE DE ABRIL	73
1523	SIMON BOLIVAR	73
1524	UNARE	73
1525	UNIVERSIDAD	73
1526	VISTA AL SOL	73
1527	POZO VERDE	73
1528	YOCOIMA	73
1530	SECCION CAPITAL CEDEÑO	74
1531	ALTAGRACIA	74
1533	GUANIAMO	74
1534	LA URBANA	74
1535	PIJIGUAOS	74
1537	CAICARA DEL ORINOCO	74
1538	EL CALLAO	75
1540	SECCION CAPITAL GRAN SABANA	76
1541	IKABARU	76
1543	SANTA ELENA DE UAIREN	76
1544	AGUA SALADA	77
1545	CATEDRAL	77
1546	JOSE ANTONIO PAEZ	77
1547	LA SABANITA	77
1548	MARHUANTA	77
1549	VISTA HERMOSA	77
1550	ORINOCO	77
1551	PANAPANA	77
1552	ZEA	77
1555	ANDRES ELOY BLANCO	78
1556	PEDRO COVA	78
1558	UPATA	78
1559	SECCION CAPITAL RAUL LEONI	79
1560	BARCELONETA	79
1561	SAN FRANCISCO	79
1562	SANTA BARBARA	79
1564	CIUDAD PIAR	79
1565	SECCION CAPITAL ROSCIO	80
1566	SALOM	80
1568	GUASIPATI	80
1570	DALLA COSTA	81
1571	SAN ISIDRO	81
1716	PEDREGAL	122
1575	ARIPAO	82
1576	GUARATARO	82
1577	LAS MAJADAS	82
1578	MOITACO	82
1580	MARIPA	82
1581	PADRE PEDRO CHIEN	83
1583	EL PALMAR	83
1584	URBANA BEJUMA	85
1585	NO URBANA CANOABO	85
1586	NO URBANA SIMON BOLIVAR	85
1588	URBANA DE GÜIGÜE	86
1589	NO URBANA BELEN	86
1592	URBANA AGUAS CALIENTES	87
1593	URBANA MARIARA	87
1595	URBANA CIUDAD ALIANZA	88
1596	URBANA GUACARA	88
1597	NO URBANA YAGUA	88
1599	URBANA MORON	89
1600	NO URBANA URAMA	89
1602	URBANA TOCUYITO	90
1603	URBANA INDEPENDENCIA	90
1605	URBANA LOS GUAYOS	91
1607	URBANA MIRANDA	92
1609	URBANA MONTALBAN	93
1611	URBANA NAGUANAGUA	94
1614	URBANA DEMOCRACIA	95
1615	URBANA FRATERNIDAD	95
1616	URBANA GOAIGOAZA	95
1617	URBANA JUAN JOSE FLORES	95
1618	URBANA UNION	95
1619	NO URBANA BORBURATA	95
1620	NO URBANA PATANEMO	95
1622	URBANA SAN DIEGO	96
1624	URBANA SAN JOAQUIN	97
1627	URBANA CATEDRAL	98
1626	URBANA CANDELARIA	98
1628	URBANA EL SOCORRO	98
1629	URBANA MIGUEL PEÑA	98
1630	URBANA RAFAEL URDANETA	98
1631	URBANA SAN BLAS	98
1632	URBANA SAN JOSE	98
1634	NO URBANA NEGRO PRIMERO	98
1636	COJEDES	100
1637	JUAN DE MATA SUAREZ	100
1639	PARROQUIA TINAQUILLO	101
1641	PARROQUIA EL BAUL	102
1642	PARROQUIA SUCRE	102
1644	PARROQUIA MACAPO	103
1645	LA AGUADITA	103
1647	EL PAO	104
1649	LIBERTAD DE COJEDES	105
1650	EL AMPARO	105
1652	ROMULO GALLEGOS	106
1655	JUAN ANGEL BRAVO	107
1656	MANUEL MANRIQUE	107
1658	GENERAL EN JEFE JOSE LAURENCIO SILVA	108
1660	CURIAPO	110
1661	ALMIRANTE LUIS BRION	110
1662	FRANCISCO ANICETO LUGO	110
1663	MANUEL RENAUD	110
1664	PADRE BARRAL	110
1665	SANTOS DE ALBEJAS	110
1667	IMATACA	111
1668	CINCO DE JULIO	111
1669	JUAN BAUTISTA ARISMENDI	111
1670	MANUEL PIAR	111
1671	ROMULO GALLEGOS	111
1673	PEDERNALES	112
1676	SAN JOSE	113
1677	JOSE VIDAL MARCANO	113
1678	JUAN MILLAN	113
1679	LEONARDO RUIZ PINEDA	113
1680	MARISCAL ANTONIO JOSE DE SUCRE	113
1681	MONSENOR ARGIMIRO GARCIA	113
1682	SAN RAFAEL	113
1683	VIRGEN DEL VALLE	113
1685	SAN JUAN DE LOS CAYOS	115
1686	CAPADARE	115
1687	LA PASTORA	115
1688	LIBERTADOR	115
1690	SAN LUIS	116
1691	ARACUA	116
1692	LA PENA	116
1694	CAPATARIDA	117
1695	BARIRO	117
1696	BOROJO	117
1697	GUAJIRO	117
1699	ZAZARIDA	117
1701	CACIQUE MANAURE	118
1703	CARIRUBANA	119
1704	NORTE	119
1705	PUNTA CARDON	119
1706	SANTA ANA	119
1708	LA VELA DE CORO	120
1709	ACURIGUA	120
1711	LAS CALDERAS	120
1712	MACORUCA	120
1714	DABAJURO	121
1717	AGUA CLARA	122
1718	AVARIA	122
1719	PIEDRA GRANDE	122
1720	PURURECHE	122
1722	PUEBLO NUEVO	123
1723	ADICORA	123
1724	BARAIVED	123
1725	BUENA VISTA	123
1726	JADACAQUIVA	123
1727	MORUY	123
1728	ADAURE	123
1730	EL VINCULO	123
1732	CHURUGUARA	124
1733	AGUA LARGA	124
1734	EL PAUJI	124
1735	INDEPENDENCIA	124
1736	MAPARARI	124
1738	JACURA	125
1739	AGUA LINDA	125
1742	LOS TANQUES	126
1743	JUDIBANA	126
1745	MENE DE MAUROA	127
1746	CASIGUA	127
1747	SAN FELIX	127
1749	SAN ANTONIO	128
1750	SAN GABRIEL	128
1751	SANTA ANA	128
1752	GUZMAN GUILLERMO	128
1753	MITARE	128
1754	RIO SECO	128
1755	SABANETA	128
1758	BOCA DE TOCUYO	129
1759	TOCUYO DE LA COSTA	129
1761	PALMASOLA	130
1765	CURIMAGUA	131
1764	COLINA	131
1763	CABURE	131
1767	PIRITU	132
1768	SAN JOSE DE LA COSTA	132
1770	SAN FRANCISCO	133
1871	Jose bernardo dorante	160
1872	Coronel mariano peraza	160
1874	Bolivar	161
1875	Anzoategui	161
1876	Guarico	161
1877	Hilario luna y luna	161
1878	Humocaro alto	161
1879	Humocaro bajo	161
1880	La candelaria	161
1881	Moran	161
1883	Cabudare	162
1884	Jose gregorio bastidas	162
1885	Agua viva	162
1887	Sarare	163
1888	Buria	163
1889	Gustavo vegas leon	163
1891	Trinidad samuel	164
1892	Antonio diaz	164
1893	Camacaro	164
1894	Castaneda	164
1895	Cecilio zubillaga	164
1896	Chiquinquira	164
1897	El blanco	164
1898	Espinoza de los monteros	164
1899	Lara	164
1900	Las mercedes	164
1901	Manuel morillo	164
1902	Montana verde	164
1903	Montes de oca	164
1904	Torres	164
1905	Heriberto arroyo	164
1906	Reyes vargas	164
1907	Altagracia	164
1909	Siquisique	165
1910	Moroturo	165
1911	San miguel	165
1912	Xaguas	165
1914	Presidente betancourt	167
1915	Presidente paez	167
1916	Presidente romulo gallegos	167
1917	Gabriel picon gonzalez	167
1918	Hector amable mora	167
1919	Jose nucete sardi	167
1920	Pulido mendez	167
1922	Andres bello	168
1924	Antonio pinto salinas	169
1925	Mesa bolivar	169
1926	Mesa de las palmas	169
1928	Aricagua	170
1929	San antonio	170
1931	Arzobispo chacon	171
1932	Capuri	171
1933	Chacanta	171
1934	El molino	171
1935	Guaimaral	171
1936	Mucutuy	171
1937	Mucuchachi	171
1939	Fernandez pena	172
1940	Matriz	172
1941	Montalban	172
1942	Acequias	172
1943	Jaji	172
1944	La mesa	172
1945	San jose del sur	172
1947	Caracciolo parra olmedo	173
1948	Florencio ramirez	173
1950	Cardenal quintero	174
1951	Las piedras	174
1953	Guaraque	175
1954	Mesa de quintero	175
1955	Rio negro	175
1957	Julio cesar salas	176
1959	Justo briceno	177
1960	San cristobal de torondoy	177
1962	Antonio spinetti dini	178
1963	Arias	178
1964	Caracciolo parra perez	178
1965	Domingo pena	178
1966	El llano	178
1967	Gonzalo picon febres	178
1968	Jacinto plaza	178
1778	TOCOPERO	136
1781	EL CHARAL	137
1782	LAS VEGAS DEL TUY	137
1784	URUMACO	138
1785	BRUZUAL	138
1787	PUERTO CUMAREBO	139
1788	LA CIENAGA	139
1789	LA SOLEDAD	139
1790	PUEBLO CUMAREBO	139
1791	ZAZARIDA	139
1793	CAMAGUAN	141
1794	PUERTO MIRANDA	141
1795	UVERITO	141
1797	CHAGUARAMAS	142
1799	EL SOCORRO	143
1802	CAZORLA	144
1804	VALLE DE LA PASCUA	145
1805	ESPINO	145
1807	LAS MERCEDES	146
1808	CABRUTA	146
1809	SANTA RITA DE MANAPIRE	146
1811	EL SOMBRERO	147
1812	SOSA	147
1814	CALABOZO	148
1815	EL CALVARIO	148
1816	EL RASTRO	148
1817	GUARDATINAJAS	148
1819	ALTAGRACIA DE ORITUCO	149
1820	LEZAMA	149
1822	PASO REAL DE MACAIRA	149
1823	SAN FRANCISCO DE MACAIRA	149
1824	SAN RAFAEL DE ORITUCO	149
1825	SOUBLETTE	149
1827	ORTIZ	150
1828	SAN FRANCISCO DE TIZNADOS	150
1829	SAN JOSE DE TIZNADOS	150
1830	SAN LORENZO DE TIZNADOS	150
1832	TUCUPIDO	151
1833	SAN RAFAEL DE LAYA	151
1835	SAN JUAN DE LOS MORROS	152
1836	CANTAGALLO	152
1837	PARAPARA	152
1839	SAN JOSE DE GUARIBE	153
1842	ALTAMIRA	154
1844	ZARAZA	155
1845	SAN JOSE DE UNARE	155
1847	PIO TAMAYO	157
1848	QUEBRADA HONDA DE GUACHE	157
1849	YACAMBU	157
1851	FREITEZ	158
1852	JOSE MARIA BLANCO	158
1854	CATEDRAL	159
1855	CONCEPCION	159
1856	EL CUJI	159
1857	JUAN DE VILLEGAS	159
1858	SANTA ROSA	159
1859	TAMACA	159
1860	UNION	159
1862	BUENA VISTA	159
1863	JUAREZ	159
1865	JUAN BAUTISTA RODRIGUEZ	160
1866	CUARA	160
1867	DIEGO DE LOSADA	160
1868	PARAISO DE SAN JOSE	160
1869	SAN MIGUEL	160
1870	TINTORERO	160
1969	Juan rodriguez suarez	178
1970	Lasso de la vega	178
1971	Mariano picon salas	178
1972	Milla	178
1973	Osuna rodriguez	178
1974	Sagrario	178
1975	El morro	178
1976	Los nevados	178
1978	Miranda	179
1979	Andres eloy blanco	179
1980	La venta	179
1981	Pinango	179
1983	Obispo ramos de lora	180
1984	Eloy paredes	180
1985	San rafael de alcazar	180
1987	Padre noguera	181
1989	Pueblo llano	182
1991	Rangel	183
1992	Cacute	183
1993	La toma	183
1994	Mucuruba	183
1995	San rafael	183
1997	Rivas davila	184
1998	Geronimo maldonado	184
2000	Santos marquina	185
2002	Sucre	186
2003	Chiguara	186
2004	Estanquez	186
2005	La trampa	186
2006	Pueblo nuevo del sur	186
2007	San juan	186
2009	El amparo	187
2010	El llano	187
2011	San francisco	187
2012	Tovar	187
2014	Tulio febres cordero	188
2015	Independencia	188
2016	Maria de la concepcion palacios blanco	188
2017	Santa apolonia	188
2019	Zea	189
2020	Cano el tigre	189
2022	Caucagua	191
2023	Aragüita	191
2024	Arevalo gonzalez	191
2025	Capaya	191
2026	El cafe	191
2027	Marizapa	191
2028	Panaquire	191
2029	Ribas	191
2031	San jose de barlovento	192
2032	Cumbo	192
2034	Baruta	193
2035	El cafetal	193
2036	Las minas de baruta	193
2038	Higuerote	194
2039	Curiepe	194
2040	Tacarigua	194
2042	Mamporal	195
2044	Carrizal	196
2046	Chacao	197
2048	Charallave	198
2049	Las brisas	198
2051	El hatillo	199
2053	Los teques	200
2054	Altagracia de la montana	200
2055	Cecilio acosta	200
2056	El jarillo	200
2057	Paracotos	200
2058	San pedro	200
2059	Tacata	200
2061	Santa teresa del tuy	201
2062	El cartanal	201
2064	Ocumare del tuy	202
2065	La democracia	202
2066	Santa barbara	202
2068	San antonio de los altos	203
2070	Rio chico	204
2071	El guapo	204
2072	Tacarigua de la laguna	204
2073	Paparo	204
2074	San fernando del guapo	204
2076	Santa lucia	205
2078	Cupira	206
2079	Machurucuto	206
2081	Guarenas	207
2083	San francisco de yare	208
2084	San antonio de yare	208
2086	Petare	209
2087	Caucagüita	209
2088	Fila de mariches	209
2089	La dolorita	209
2090	Leoncio martinez	209
2092	Cua	210
2093	Nueva cua	210
2095	Guatire	211
2096	Bolivar	211
2098	Acosta	213
2099	San francisco	213
2101	Aguasay	214
2103	Bolivar	215
2105	Caripe	216
2106	El guacharo	216
2107	La guanota	216
2108	Sabana de piedra	216
2109	San agustin	216
2110	Teresen	216
2112	Cedeno	217
2113	Areo	217
2114	San felix	217
2115	Viento fresco	217
2117	Ezequiel zamora	218
2118	El tejero	218
2120	Libertador	219
2121	Chaguaramas	219
2122	Las alhuacas	219
2123	Tabasca	219
2125	Maturin	220
2126	Alto de los godos	220
2127	Boqueron	220
2128	Las cocuizas	220
2129	San simon	220
2130	Santa cruz	220
2131	El corozo	220
2132	El furrial	220
2133	Jusepin	220
2134	La pica	220
2135	San vicente	220
2137	Piar	221
2138	Aparicio	221
2139	Chaguaramal	221
2140	El pinto	221
2141	Guanaguana	221
2142	La toscana	221
2143	Taguaya	221
2145	Punceres	222
2146	Cachipo	222
2148	Santa barbara	223
2150	Sotillo	224
2151	Los barrancos de fajardo	224
2153	Uracoa	225
2155	Antolin del campo	227
2157	Arismendi	228
2159	Diaz	229
2160	Zabala	229
2162	Garcia	230
2163	Francisco fajardo	230
2165	Gomez	231
2166	Bolivar	231
2167	Guevara	231
2168	Matasiete	231
2169	Sucre	231
2171	Maneiro	232
2172	Aguirre	232
2174	Marcano	233
2175	Adrian	233
2177	Marino	234
2179	Peninsula de macanao	235
2180	San francisco	235
2182	Tubores	236
2183	Los barales	236
2185	Villalba	237
2186	Vicente fuentes	237
2188	Agua blanca	239
2190	Araure	240
2191	Rio acarigua	240
2193	Esteller	241
2194	Uveral	241
2196	Guanare	242
2197	Cordoba	242
2198	San jose de la montana	242
2199	San juan de guanaguanare	242
2200	Virgen de la coromoto	242
2202	Guanarito	243
2203	Trinidad de la capilla	243
2204	Divina pastora	243
2206	Monsenor jose vicente de unda	244
2207	Pena blanca	244
2209	Ospino	245
2210	Aparicion	245
2211	La estacion	245
2213	Paez	246
2214	Payara	246
2215	Pimpinela	246
2216	Ramon peraza	246
2218	Papelon	247
2219	Cano delgadito	247
2221	San genaro de boconoito	248
2222	Antolin tovar	248
2224	San rafael de onoto	249
2225	Santa fe	249
2226	Thermo morles	249
2228	Santa rosalia	250
2229	Florida	250
2231	Sucre	251
2232	Concepcion	251
2233	San rafael de palo alzado	251
2234	Uvencio antonio velasquez	251
2235	San jose de saguaz	251
2236	Villa rosa	251
2238	Turen	252
2239	Canelones	252
2240	Santa cruz	252
2241	San isidro labrador	252
2243	Marino	254
2244	Romulo gallegos	254
2246	San jose de aerocuar	255
2247	Tavera acosta	255
2249	Rio caribe	256
2250	Antonio jose de sucre	256
2251	El morro de puerto santo	256
2252	Puerto santo	256
2253	San juan de las galdonas	256
2255	El pilar	257
2256	El rincon	257
2257	General francisco antonio vasquez	257
2258	Guaraunos	257
2259	Tunapuicito	257
2260	Union	257
2262	Bolivar	258
2263	Macarapana	258
2264	Santa catalina	258
2265	Santa rosa	258
2266	Santa teresa	258
2268	Bolivar	259
2270	Yaguaraparo	260
2271	El paujil	260
2272	Libertad	260
2274	Araya	261
2275	Chacopata	261
2276	Manicuare	261
2278	Tunapuy	262
2279	Campo elias	262
2281	Irapa	263
2282	Campo claro	263
2283	Marabal	263
2284	San antonio de irapa	263
2285	Soro	263
2287	Mejia	264
2289	Cumanacoa	265
2290	Arenas	265
2291	Aricagua	265
2292	Cocollar	265
2293	San fernando	265
2294	San lorenzo	265
2296	Villa frontado (muelle de cariaco)	266
2297	Catuaro	266
2298	Rendon	266
2299	Santa cruz	266
2300	Santa maria	266
2302	Altagracia	267
2303	Ayacucho	267
2304	Santa ines	267
2305	Valentin valiente	267
2306	San juan	267
2307	Raul leoni	267
2308	Santa fe	267
2310	Güiria	268
2311	Bideau	268
2312	Cristobal colon	268
2313	Punta de piedras	268
2315	Andres bello	270
2317	Antonio romulo costa	271
2319	Ayacucho	272
2320	Rivas berti	272
2321	San pedro del rio	272
2323	Bolivar	273
2324	Palotal	273
2325	Juan vicente gomez	273
2326	Isaias medina angarita	273
2328	Cardenas	274
2329	Amenodoro rangel lamus	274
2330	La florida	274
2332	Cordoba	275
2334	Fernandez feo	276
2335	Alberto adriani	276
2336	Santo domingo	276
2338	Francisco de miranda	277
2340	Garcia de hevia	278
2341	Boca de grita	278
2342	Jose antonio paez	278
2344	Guasimos	279
2346	Independencia	280
2347	Juan german roscio	280
2348	Roman cardenas	280
2350	Jauregui	281
2351	Emilio constantino guerrero	281
2352	Monsenor miguel antonio salas	281
2354	Jose maria vargas	282
2356	Junin	283
2357	La petrolea	283
2358	Quinimari	283
2359	Bramon	283
2361	Libertad	284
2362	Cipriano castro	284
2363	Manuel felipe rugeles	284
2365	Libertador	285
2366	Emeterio ochoa	285
2367	Doradas	285
2368	San joaquin de navay	285
2370	Lobatera	286
2371	Constitucion	286
2373	Michelena	287
2375	Panamericano	288
2376	La palmita	288
2378	Pedro maria urena	289
2379	Nueva arcadia	289
2381	Rafael urdaneta	290
2383	Samuel dario maldonado	291
2384	Bocono	291
2385	Hernandez	291
2387	La concordia	292
2388	Pedro maria morantes	292
2389	San juan bautista	292
2390	San sebastian	292
2391	Dr. francisco romero lobo	292
2393	Seboruco	293
2395	Simon rodriguez	294
2397	Sucre	295
2398	Eleazar lopez contreras	295
2399	San pablo	295
2401	Torbes	296
2403	Uribante	297
2404	Cardenas	297
2405	Juan pablo penaloza	297
2406	Potosi	297
2408	San judas tadeo	298
2410	Santa isabel	300
2411	Araguaney	300
2412	El jagüito	300
2413	La esperanza	300
2415	Bocono	301
2416	El carmen	301
2417	Mosquey	301
2418	Ayacucho	301
2419	Burbusay	301
2420	General rivas	301
2421	Guaramacal	301
2422	Vega de guaramacal	301
2423	Monsenor jauregui	301
2424	Rafael rangel	301
2425	San miguel	301
2426	San jose	301
2428	Sabana grande	302
2429	Cheregüe	302
2430	Granados	302
2432	Chejende	303
2433	Arnoldo gabaldon	303
2434	Bolivia	303
2435	Carrillo	303
2436	Cegarra	303
2437	Manuel salvador ulloa	303
2438	San jose	303
2440	Carache	304
2441	Cuicas	304
2442	La concepcion	304
2443	Panamericana	304
2444	Santa cruz	304
2446	Escuque	305
2447	La union	305
2448	Sabana libre	305
2449	Santa rita	305
2451	El socorro	306
2452	Antonio jose de sucre	306
2453	Los caprichos	306
2455	Campo elias	307
2456	Arnoldo gabaldon	307
2458	Santa apolonia	308
2459	El progreso	308
2460	La ceiba	308
2461	Tres de febrero	308
2463	El dividive	309
2464	Agua santa	309
2465	Agua caliente	309
2466	El cenizo	309
2467	Valerita	309
2469	Monte carmelo	310
2470	Buena vista	310
2471	Santa maria del horcon	310
2473	Motatan	311
2474	El bano	311
2475	Jalisco	311
2477	Pampan	312
2478	Flor de patria	312
2479	La paz	312
2480	Santa ana	312
2482	Pampanito	313
2483	La concepcion	313
2484	Pampanito ii	313
2486	Betijoque	314
2487	La pueblita	314
2488	Los cedros	314
2489	Jose gregorio hernandez	314
2491	Carvajal	315
2492	Antonio nicolas briceno	315
2493	Campo alegre	315
2494	Jose leonardo suarez	315
2496	Sabana de mendoza	316
2497	El paraiso	316
2498	Junin	316
2499	Valmore rodriguez	316
2501	Andres linares	317
2502	Chiquinquira	317
2503	Cristobal mendoza	317
2504	Cruz carrillo	317
2505	Matriz	317
2506	Monsenor carrillo	317
2507	Tres esquinas	317
2509	La quebrada	318
2510	Cabimbu	318
2511	Jajo	318
2512	La mesa	318
2513	Santiago	318
2514	Tuname	318
2516	Juan ignacio montilla	319
2517	La beatriz	319
2518	Mercedes diaz	319
2519	San luis	319
2520	La puerta	319
2521	Mendoza	319
2523	Aristides bastidas	321
2525	Bolivar	322
2527	Bruzual	323
2528	Campo elias	323
2530	Cocorote	324
2532	Independencia	325
2534	Jose antonio paez	326
2536	La trinidad	327
2538	Manuel monge	328
2540	Nirgua	329
2541	Salom	329
2542	Temerla	329
2544	Pena	330
2545	San andres	330
2547	San felipe	331
2548	Albarico	331
2549	San javier	331
2551	Sucre	332
2553	Urachiche	333
2555	Veroes	334
2556	El guayabo	334
2558	Parroquia isla de toas	336
2559	Parroquia monagas	336
2561	San timoteo	337
2562	General urdaneta	337
2563	Libertador	337
2564	Manuel guanipa matos	337
2565	Marcelino briceno	337
2566	Pueblo nuevo	337
2568	Ambrosio	338
2569	Carmen herrera	338
2570	German rios linares	338
2571	La rosa	338
2572	Jorge hernandez	338
2573	Romulo betancourt	338
2574	San benito	338
2575	Aristides calvani	338
2576	Punta gorda	338
2578	Encontrados	339
2579	Udon perez	339
2581	San carlos del zulia	340
2582	Moralito	340
2583	Santa barbara	340
2584	Santa cruz del zulia	340
2585	Urribarri	340
2587	Simon rodriguez	341
2588	Carlos quevedo	341
2589	Francisco javier pulgar	341
2591	La concepcion	342
2592	Jose ramon yepes	342
2593	Mariano parra leon	342
2594	San jose	342
2596	Jesus maria semprun	343
2597	Bari	343
2599	Concepcion	344
2600	Andres bello	344
2601	Chiquinquira	344
2602	El carmelo	344
2603	Potreritos	344
2605	Alonso de ojeda	345
2606	Libertad	345
2607	Campo lara	345
2608	Eleazar lopez contreras	345
2609	Venezuela	345
2611	Libertad	346
2612	Bartolome de las casas	346
2613	Rio negro	346
2614	San jose de perija	346
2616	San rafael	347
2617	La sierrita	347
2618	Las parcelas	347
2619	Luis de vicente	347
2620	Monsenor marcos sergio godoy	347
2621	Ricaurte	347
2622	Tamare	347
2624	Antonio borjas romero	348
2625	Bolivar	348
2626	Cacique mara	348
2627	Caracciolo parra perez	348
2628	Cecilio acosta	348
2629	Cristo de aranza	348
2630	Coquivacoa	348
2631	Chiquinquira	348
2632	Francisco eugenio bustamante	348
2633	Idelfonso vasquez	348
2634	Juana de avila	348
2635	Luis hurtado higuera	348
2636	Manuel dagnino	348
2637	Olegario villalobos	348
2638	Raul leoni	348
2639	Santa lucia	348
2640	Venancio pulgar	348
2641	San isidro	348
2643	Altagracia	349
2644	Ana maria campos	349
2645	Faria	349
2646	San antonio	349
2647	San jose	349
2649	Sinamaica	350
2650	Alta guajira	350
2651	Elias sanchez rubio	350
2652	Guajira	350
2654	El rosario	351
2655	Donaldo garcia	351
2656	Sixto zambrano	351
2658	San francisco	352
2659	El bajo	352
2660	Domitila flores	352
2661	Francisco ochoa	352
2662	Los cortijos	352
2663	Marcial hernandez	352
2665	Santa rita	353
2666	El mene	353
2667	Jose cenovio urribarri	353
2668	Pedro lucas urribarri	353
2670	Manuel manrique	354
2671	Rafael maria baralt	354
2672	Rafael urdaneta	354
2674	Bobures	355
2675	El batey	355
2676	Gibraltar	355
2677	Heras	355
2678	Monsenor arturo celestino alvarez	355
2679	Romulo gallegos	355
2681	La victoria	356
2682	Rafael urdaneta	356
2683	Raul cuenca	356
2685	Caraballeda	358
2686	Carayaca	358
2687	Caruao	358
2688	Catia la mar	358
2689	El junko	358
2690	La guaira	358
2691	Macuto	358
2692	Maiquetia	358
2693	Naiguata	358
2694	Raul leoni	358
2695	Carlos soublette	358
2697	Calabozo	359
2698	No existe	360
1195	ALTAGRACIA	2
1204	EL VALLE	2
1218	ALTO ORINOCO	3
1231	LUIS ALBERTO GOMEZ	5
1252	CASIQUIARE	9
1267	VALLE DE GUANAPE	14
1290	JOSE GREGORIO MONAGAS	20
1305	SABANA DE UCHIRE	22
1328	EL PILAR	28
1345	QUESERAS DEL MEDIO	33
1361	URBANA SAN JUAN DE PAYARA	37
1379	NO URBANA CHORONI	43
1380	URBANA LAS DELICIAS	43
1381	URBANA MADRE MARIA DE SAN JOSE	43
1382	URBANA JOAQUIN CRESPO	43
1383	URBANA PEDRO JOSE OVALLES	43
1384	URBANA JOSE CASANOVA GODOY	43
1385	URBANA ANDRES ELOY BLANCO	43
1386	URBANA LOS TACARIGUAS	43
1388	JOSE ANGEL LAMAS	44
1390	SANTA CRUZ	44
1391	JOSE FELIX RIBAS	45
1410	NOURBANA GÜIRIPA	49
1420	NO URBANA ALFREDO PACHECO MIRANDA	51
1447	FRANCISCO LINARES ALCANTARA	57
1472	EL CARMEN	63
1487	MASPARRITO	65
1501	JOSE FELIX RIBAS	68
1521	DALLA COSTA	73
1532	ASCENCION FARRERAS	74
1554	SECCION CAPITAL PIAR	78
1569	SECCION CAPITAL SIFONTES	81
1573	TUMEREMO	81
1574	SECCION CAPITAL SUCRE	82
1590	NO URBANA TACARIGUA	86
1613	URBANA BARTOLOME SALOM	95
1633	URBANA SANTA ROSA	98
1654	SAN CARLOS DE AUSTRIA	107
1674	LUIS BELTRAN PRIETO FIGUEROA	112
1698	SEQUE	117
1710	GUAIBACOA	120
1729	EL HATO	123
1740	ARAURIMA	125
1757	CHICHIRIVICHE	129
1772	TUCACAS	134
1773	BOCA DE AROA	134
1775	SUCRE	135
1776	PECAYA	135
1780	SANTA CRUZ DE BUCARAL	137
1801	SAN GERONIMO DE GUAYABAL	144
1821	LIBERTAD DE ORITUCO	149
1841	SANTA MARIA DE IPIRE	154
1861	AGUEDO FELIPE ALVARADO	159
\.


--
-- TOC entry 3192 (class 0 OID 41183)
-- Dependencies: 221
-- Data for Name: estatus; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

COPY seguridad.estatus (id_estatus, descripcion, fecha_reg, fecha_update) FROM stdin;
1	Activo	2020-02-03	2020-02-03 00:00:00
2	Suspendido	2020-02-03	2020-02-03 00:00:00
3	Eliminado	2020-02-03	2020-02-03 00:00:00
4	Registrado	2020-02-24	2020-02-03 00:00:00
5	Aprobado	2020-02-24	2020-02-03 00:00:00
6	Cancelado	2020-02-24	2020-02-03 00:00:00
7	Comprometido	2020-06-09	2020-06-09 17:28:00
8	Abonado	2020-06-09	2020-06-09 17:28:00
9	Pagado	2020-06-09	2020-06-09 17:28:00
\.


--
-- TOC entry 3193 (class 0 OID 41190)
-- Dependencies: 222
-- Data for Name: perfil; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

COPY seguridad.perfil (id_perfil, descripcion, fecha_reg, fecha_update) FROM stdin;
1	Administrador	2021-01-03	2021-01-03 00:00:00
2	Encargado	2021-01-03	2021-01-03 00:00:00
3	Vendedor	2021-01-03	2021-01-03 00:00:00
\.


--
-- TOC entry 3194 (class 0 OID 41197)
-- Dependencies: 223
-- Data for Name: persona; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

COPY seguridad.persona (id_persona, id_tip_doc, cedula, nom_ape, fecha_reg, fecha_update) FROM stdin;
1	1	0000001	Administrador prueba	2021-03-02	2021-03-10 00:00:00
\.


--
-- TOC entry 3196 (class 0 OID 41206)
-- Dependencies: 225
-- Data for Name: usuarios; Type: TABLE DATA; Schema: seguridad; Owner: postgres
--

COPY seguridad.usuarios (id_user, usuario, contrasenia, id_perfil, id_persona, fecha_reg, fecha_update, id_estatus) FROM stdin;
2	rpabon	$2y$10$.kjSMpTdD0MvZRKQ9eBJFeGKQ/ONJFL9.O9n7a/lW.xQCrJENH3aS	1	1	2021-03-02	2021-03-02 00:00:00	1
1	admin	$2y$10$.kjSMpTdD0MvZRKQ9eBJFeGKQ/ONJFL9.O9n7a/lW.xQCrJENH3aS	2	1	2021-03-02	2021-03-02 00:00:00	2
\.


--
-- TOC entry 3242 (class 0 OID 0)
-- Dependencies: 245
-- Name: reg_prod_fact_id_reg_prod_fact_seq; Type: SEQUENCE SET; Schema: facturas; Owner: postgres
--

SELECT pg_catalog.setval('facturas.reg_prod_fact_id_reg_prod_fact_seq', 1, false);


--
-- TOC entry 3243 (class 0 OID 0)
-- Dependencies: 243
-- Name: registro_fact_id_registro_fact_seq; Type: SEQUENCE SET; Schema: facturas; Owner: postgres
--

SELECT pg_catalog.setval('facturas.registro_fact_id_registro_fact_seq', 1, false);


--
-- TOC entry 3244 (class 0 OID 0)
-- Dependencies: 241
-- Name: inv_id_inv_seq; Type: SEQUENCE SET; Schema: inventario; Owner: postgres
--

SELECT pg_catalog.setval('inventario.inv_id_inv_seq', 2, true);


--
-- TOC entry 3245 (class 0 OID 0)
-- Dependencies: 235
-- Name: anul_fact_id_anul_fact_seq; Type: SEQUENCE SET; Schema: luz; Owner: postgres
--

SELECT pg_catalog.setval('luz.anul_fact_id_anul_fact_seq', 1, false);


--
-- TOC entry 3246 (class 0 OID 0)
-- Dependencies: 233
-- Name: apr_canc_fac_id_a_c_fac_seq; Type: SEQUENCE SET; Schema: luz; Owner: postgres
--

SELECT pg_catalog.setval('luz.apr_canc_fac_id_a_c_fac_seq', 1, false);


--
-- TOC entry 3247 (class 0 OID 0)
-- Dependencies: 231
-- Name: inv_resp_id_inv_resp_seq; Type: SEQUENCE SET; Schema: luz; Owner: postgres
--

SELECT pg_catalog.setval('luz.inv_resp_id_inv_resp_seq', 2, true);


--
-- TOC entry 3248 (class 0 OID 0)
-- Dependencies: 229
-- Name: mov_consig_id_mov_consig_seq; Type: SEQUENCE SET; Schema: luz; Owner: postgres
--

SELECT pg_catalog.setval('luz.mov_consig_id_mov_consig_seq', 1, false);


--
-- TOC entry 3249 (class 0 OID 0)
-- Dependencies: 237
-- Name: mov_prod_cons_id_reg_fact_seq; Type: SEQUENCE SET; Schema: luz; Owner: postgres
--

SELECT pg_catalog.setval('luz.mov_prod_cons_id_reg_fact_seq', 1, false);


--
-- TOC entry 3250 (class 0 OID 0)
-- Dependencies: 208
-- Name: categoria_id_categoria_seq; Type: SEQUENCE SET; Schema: parametros; Owner: postgres
--

SELECT pg_catalog.setval('parametros.categoria_id_categoria_seq', 4, true);


--
-- TOC entry 3251 (class 0 OID 0)
-- Dependencies: 210
-- Name: cliente_id_cliente_seq; Type: SEQUENCE SET; Schema: parametros; Owner: postgres
--

SELECT pg_catalog.setval('parametros.cliente_id_cliente_seq', 6, true);


--
-- TOC entry 3252 (class 0 OID 0)
-- Dependencies: 212
-- Name: conv_moneda_id_moneda_seq; Type: SEQUENCE SET; Schema: parametros; Owner: postgres
--

SELECT pg_catalog.setval('parametros.conv_moneda_id_moneda_seq', 1, false);


--
-- TOC entry 3253 (class 0 OID 0)
-- Dependencies: 239
-- Name: producto_id_producto_seq; Type: SEQUENCE SET; Schema: parametros; Owner: postgres
--

SELECT pg_catalog.setval('parametros.producto_id_producto_seq', 2, true);


--
-- TOC entry 3254 (class 0 OID 0)
-- Dependencies: 214
-- Name: tip_doc_id_tip_doc_seq; Type: SEQUENCE SET; Schema: parametros; Owner: postgres
--

SELECT pg_catalog.setval('parametros.tip_doc_id_tip_doc_seq', 1, false);


--
-- TOC entry 3255 (class 0 OID 0)
-- Dependencies: 227
-- Name: tip_pago_id_tip_pago_seq; Type: SEQUENCE SET; Schema: parametros; Owner: postgres
--

SELECT pg_catalog.setval('parametros.tip_pago_id_tip_pago_seq', 1, false);


--
-- TOC entry 3256 (class 0 OID 0)
-- Dependencies: 216
-- Name: ciudades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ciudades_id_seq', 1, false);


--
-- TOC entry 3257 (class 0 OID 0)
-- Dependencies: 218
-- Name: estados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estados_id_seq', 1, false);


--
-- TOC entry 3258 (class 0 OID 0)
-- Dependencies: 224
-- Name: persona_id_persona_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('seguridad.persona_id_persona_seq', 8, true);


--
-- TOC entry 3259 (class 0 OID 0)
-- Dependencies: 226
-- Name: usuarios_id_user_seq; Type: SEQUENCE SET; Schema: seguridad; Owner: postgres
--

SELECT pg_catalog.setval('seguridad.usuarios_id_user_seq', 6, true);


--
-- TOC entry 3050 (class 2606 OID 58185)
-- Name: reg_prod_fact id_reg_prod_fact_pkey; Type: CONSTRAINT; Schema: facturas; Owner: postgres
--

ALTER TABLE ONLY facturas.reg_prod_fact
    ADD CONSTRAINT id_reg_prod_fact_pkey PRIMARY KEY (id_reg_prod_fact);


--
-- TOC entry 3048 (class 2606 OID 58173)
-- Name: registro_fact id_registro_fact_pkey; Type: CONSTRAINT; Schema: facturas; Owner: postgres
--

ALTER TABLE ONLY facturas.registro_fact
    ADD CONSTRAINT id_registro_fact_pkey PRIMARY KEY (id_registro_fact);


--
-- TOC entry 3046 (class 2606 OID 58161)
-- Name: inv id_inv_pkey; Type: CONSTRAINT; Schema: inventario; Owner: postgres
--

ALTER TABLE ONLY inventario.inv
    ADD CONSTRAINT id_inv_pkey PRIMARY KEY (id_inv);


--
-- TOC entry 3040 (class 2606 OID 58113)
-- Name: apr_canc_fac id_a_c_fac_pkey; Type: CONSTRAINT; Schema: luz; Owner: postgres
--

ALTER TABLE ONLY luz.apr_canc_fac
    ADD CONSTRAINT id_a_c_fac_pkey PRIMARY KEY (id_a_c_fac);


--
-- TOC entry 3038 (class 2606 OID 58104)
-- Name: inv_resp id_inv_resp_pkey; Type: CONSTRAINT; Schema: luz; Owner: postgres
--

ALTER TABLE ONLY luz.inv_resp
    ADD CONSTRAINT id_inv_resp_pkey PRIMARY KEY (id_inv_resp);


--
-- TOC entry 3036 (class 2606 OID 58092)
-- Name: mov_consig id_mov_consig_pkey; Type: CONSTRAINT; Schema: luz; Owner: postgres
--

ALTER TABLE ONLY luz.mov_consig
    ADD CONSTRAINT id_mov_consig_pkey PRIMARY KEY (id_mov_consig);


--
-- TOC entry 3042 (class 2606 OID 58134)
-- Name: mov_prod_cons id_reg_fact_pkey; Type: CONSTRAINT; Schema: luz; Owner: postgres
--

ALTER TABLE ONLY luz.mov_prod_cons
    ADD CONSTRAINT id_reg_fact_pkey PRIMARY KEY (id_reg_fact);


--
-- TOC entry 3010 (class 2606 OID 41247)
-- Name: categoria categoria_pkey; Type: CONSTRAINT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id_categoria);


--
-- TOC entry 3012 (class 2606 OID 41249)
-- Name: cliente cliente_pkey; Type: CONSTRAINT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id_cliente);


--
-- TOC entry 3014 (class 2606 OID 41251)
-- Name: conv_moneda moneda_pkey; Type: CONSTRAINT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.conv_moneda
    ADD CONSTRAINT moneda_pkey PRIMARY KEY (id_moneda);


--
-- TOC entry 3044 (class 2606 OID 58146)
-- Name: producto producto_pkey; Type: CONSTRAINT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.producto
    ADD CONSTRAINT producto_pkey PRIMARY KEY (id_producto);


--
-- TOC entry 3016 (class 2606 OID 41255)
-- Name: tip_doc tip_doc_pkey; Type: CONSTRAINT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.tip_doc
    ADD CONSTRAINT tip_doc_pkey PRIMARY KEY (id_tip_doc);


--
-- TOC entry 3034 (class 2606 OID 49348)
-- Name: tip_pago tip_pago_pkey; Type: CONSTRAINT; Schema: parametros; Owner: postgres
--

ALTER TABLE ONLY parametros.tip_pago
    ADD CONSTRAINT tip_pago_pkey PRIMARY KEY (id_tip_pago);


--
-- TOC entry 3022 (class 2606 OID 41257)
-- Name: municipios id_municipios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipios
    ADD CONSTRAINT id_municipios_pkey PRIMARY KEY (id_municipio);


--
-- TOC entry 3024 (class 2606 OID 41259)
-- Name: parroquias id_parroquia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parroquias
    ADD CONSTRAINT id_parroquia_pkey PRIMARY KEY (id_parroquia);


--
-- TOC entry 3018 (class 2606 OID 41261)
-- Name: ciudades pk_ciudades; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ciudades
    ADD CONSTRAINT pk_ciudades PRIMARY KEY (id);


--
-- TOC entry 3020 (class 2606 OID 41263)
-- Name: estados pk_estados; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estados
    ADD CONSTRAINT pk_estados PRIMARY KEY (id);


--
-- TOC entry 3026 (class 2606 OID 41265)
-- Name: estatus estatus_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.estatus
    ADD CONSTRAINT estatus_pkey PRIMARY KEY (id_estatus);


--
-- TOC entry 3028 (class 2606 OID 41267)
-- Name: perfil perfil_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.perfil
    ADD CONSTRAINT perfil_pkey PRIMARY KEY (id_perfil);


--
-- TOC entry 3030 (class 2606 OID 41269)
-- Name: persona persona_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.persona
    ADD CONSTRAINT persona_pkey PRIMARY KEY (id_persona);


--
-- TOC entry 3032 (class 2606 OID 41271)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: seguridad; Owner: postgres
--

ALTER TABLE ONLY seguridad.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_user);


--
-- TOC entry 3051 (class 2606 OID 41272)
-- Name: ciudades fk_ciudades_rlcciuedo_estados; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ciudades
    ADD CONSTRAINT fk_ciudades_rlcciuedo_estados FOREIGN KEY (estado_id) REFERENCES public.estados(id);


-- Completed on 2022-08-02 12:03:46 -04

--
-- PostgreSQL database dump complete
--

