DIR = /home/szhakypo

all: inception

inception:
	mkdir -p /home/szhakypo/data/mariadb
	mkdir -p /home/szhakypo/data/wordpress
	docker-compose -f ./srcs/docker-compose.yml up --build -d

clean:
	docker-compose -f ./srcs/docker-compose.yml down --rmi all -v --remove-orphans 2>/dev/null || true

fclean: clean
	sudo rm -rf /home/szhakypo/data/*
	docker rmi -f $$(docker images -a -q) 2> /dev/null || true
	docker volume prune -f

re: fclean all
