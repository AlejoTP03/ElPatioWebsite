PGDMP  2                 
    |            DatabaseElPatio    16.3    16.3     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    42350    DatabaseElPatio    DATABASE     �   CREATE DATABASE "DatabaseElPatio" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';
 !   DROP DATABASE "DatabaseElPatio";
                postgres    false            �            1259    42434 	   almacenes    TABLE     �   CREATE TABLE public.almacenes (
    codigo integer NOT NULL,
    nombre character varying(255) NOT NULL,
    telefono character varying(20),
    codigomaterial integer
);
    DROP TABLE public.almacenes;
       public         heap    postgres    false            �            1259    42444    empleado    TABLE     �   CREATE TABLE public.empleado (
    ci integer NOT NULL,
    nombre character varying(255) NOT NULL,
    apellido character varying(255) NOT NULL,
    telefono character varying(20),
    direccion character varying(255),
    idalmacen integer
);
    DROP TABLE public.empleado;
       public         heap    postgres    false            �            1259    42429    material    TABLE     r   CREATE TABLE public.material (
    codigomaterial integer NOT NULL,
    nombre character varying(255) NOT NULL
);
    DROP TABLE public.material;
       public         heap    postgres    false            �            1259    42451 	   proveedor    TABLE     �   CREATE TABLE public.proveedor (
    ci integer NOT NULL,
    nombre character varying(255) NOT NULL,
    apellido character varying(255) NOT NULL,
    municipio character varying(255),
    provincia character varying(255),
    codigomaterial integer
);
    DROP TABLE public.proveedor;
       public         heap    postgres    false            �          0    42434 	   almacenes 
   TABLE DATA           M   COPY public.almacenes (codigo, nombre, telefono, codigomaterial) FROM stdin;
    public          postgres    false    216   �       �          0    42444    empleado 
   TABLE DATA           X   COPY public.empleado (ci, nombre, apellido, telefono, direccion, idalmacen) FROM stdin;
    public          postgres    false    217   �       �          0    42429    material 
   TABLE DATA           :   COPY public.material (codigomaterial, nombre) FROM stdin;
    public          postgres    false    215          �          0    42451 	   proveedor 
   TABLE DATA           _   COPY public.proveedor (ci, nombre, apellido, municipio, provincia, codigomaterial) FROM stdin;
    public          postgres    false    218   J       
           2606    42438    almacenes almacenes_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.almacenes
    ADD CONSTRAINT almacenes_pkey PRIMARY KEY (codigo);
 B   ALTER TABLE ONLY public.almacenes DROP CONSTRAINT almacenes_pkey;
       public            postgres    false    216                       2606    42450    empleado empleado_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT empleado_pkey PRIMARY KEY (ci);
 @   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_pkey;
       public            postgres    false    217                       2606    42433    material material_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.material
    ADD CONSTRAINT material_pkey PRIMARY KEY (codigomaterial);
 @   ALTER TABLE ONLY public.material DROP CONSTRAINT material_pkey;
       public            postgres    false    215                       2606    42457    proveedor proveedor_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT proveedor_pkey PRIMARY KEY (ci);
 B   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT proveedor_pkey;
       public            postgres    false    218                       2606    42439 '   almacenes almacenes_codigomaterial_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.almacenes
    ADD CONSTRAINT almacenes_codigomaterial_fkey FOREIGN KEY (codigomaterial) REFERENCES public.material(codigomaterial);
 Q   ALTER TABLE ONLY public.almacenes DROP CONSTRAINT almacenes_codigomaterial_fkey;
       public          postgres    false    216    4616    215                       2606    42458 '   proveedor proveedor_codigomaterial_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT proveedor_codigomaterial_fkey FOREIGN KEY (codigomaterial) REFERENCES public.material(codigomaterial);
 Q   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT proveedor_codigomaterial_fkey;
       public          postgres    false    215    218    4616            �   $   x�33��t��MLN�3�41537�442����� c��      �   7   x���0735�t,*)-���LI��4���r:����+��ps��qqq A%      �      x�342��M,I-�L�1����� 3��      �   ?   x��47356�(�/KMM�/2�t,H���L�7��-��L�,�2A�yə�F��F�\1z\\\ /c�     