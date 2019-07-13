ALTER TABLE filiere_niveau_option
ADD FOREIGN KEY (id_niveau) REFERENCES niveau(id_niveau);

ALTER TABLE filiere_niveau_option
ADD FOREIGN KEY (id_option) REFERENCES ea_option(id_option);

ALTER TABLE filiere_niveau_option
ADD FOREIGN KEY (id_filiere) REFERENCES filiere(id_filiere);