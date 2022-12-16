# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Makefile                                           :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: incho <incho@student.42seoul.kr>           +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2022/02/01 08:18:34 by incho             #+#    #+#              #
#    Updated: 2022/12/16 15:36:52 by incho            ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

NAME	=	inception


# ----------------------------------
# CLI commands
# ----------------------------------

CP		=	cp
RM		=	rm -f
MKDIR	=	mkdir -p
MV		=	mv
ECHO	=	echo
MAKE	=	make
SUDO	=	sudo
CHMOD	=	chmod
TOUCH	=	touch


# ----------------------------------
# Docker commands
# ----------------------------------

DOCKER		=	docker
DOCKERCMPS	=	docker compose -f
UP			=	up --force-recreate --build -d
DOWN		=	down -v --rmi all --remove-orhpans


# ----------------------------------
# Echo Colors
# ----------------------------------

NOCOLOR		= \033[0m
RED			= \033[0;31m
GREEN		= \033[0;32m
ORANGE		= \033[0;33m
BLUE		= \033[0;34m
PURPLE		= \033[0;35m
CYAN		= \033[0;36m
LIGHTGRAY	= \033[0;37m
DARKGRAY	= \033[1;30m
LIGHTRED	= \033[1;31m
LIGHTGREEN	= \033[1;32m
YELLOW		= \033[1;33m
LIGHTBLUE	= \033[1;34m
LIGHTPURPLE	= \033[1;35m
LIGHTCYAN	= \033[1;36m
WHITE		= \033[1;37m


# ----------------------------------
# Debug flag
# ----------------------------------

ifdef DEBUG
	$(ECHO) "$(ORANGE)Make in DEBUG mode ...$(NOCOLOR)"
endif


# ----------------------------------
# Data && Directories
# ----------------------------------

SRC_DIR		=	./srcs
DATA_DIR	=	${HOME}/data

CMPS_YML	=	docker-compose.yml


# ----------------------------------
# Rules
# ----------------------------------

all				:	$(NAME)

$(NAME)			:
			@$(SUDO) $(MKDIR) $(DATA_DIR)/mariadb
			@$(SUDO) $(DOCKERCMPS) $(SRC_DIR)/$(CMPS_YML) $(UP)
			@$(ECHO) "Composed up $(BLUE)$(NAME)$(NOCOLOR) $(GREEN)Successfully$(NOCOLOR) using $(LIGHTGRAY)$(CMPS_YML)$(NOCOLOR)"


clean			:
			@$(SUDO) $(DOCKERCMPS) $(SRC_DIR)/$(CMPS_YML) $(DOWN) 
			@$(ECHO) "Cleaned down$(RED)$(NAME)$(NOCOLOR) using $(LIGHTGRAY)$(CMPS_YML)$(NOCOLOR)"

fclean			:	clean
			@$(SUDO) $(RM) $(DATA_DIR)
			@$(SUDO) $(DOCKER) system prune --volumes --all --force
			@$(SUDO) $(DOCKER) network prune --force
			@$(SUDO) $(DOCKER) volume prune --force
			@$(ECHO) "Removed $(RED)$(NAME)'s Docker network, volume and all files and directories.$(NOCOLOR)"

re				:	fclean all

# ----------------------------------
# Custom Rules
# ----------------------------------

log				:
			$(SUDO) $(DOCKERCMPS) $(SRC_DIR)/$(CMPS_YML) logs -f

ps				:
			$(SUDO) $(DOCKERCMPS) $(SRC_DIR)/$(CMPS_YML) ps


.PHONY			:	all clean fclean re log ps
