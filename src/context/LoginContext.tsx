import { createContext, useContext, useState, useEffect } from 'react';

interface LoginContextProps {
  /* token2: string | null; */
  login: (user: {id: string, token: string}) => void;
  logout: () => void;
  isLoggedIn: boolean;
}

const LoginContext = createContext<LoginContextProps | undefined>(undefined);

const LoginProvider: React.FC<{ children: React.ReactNode }> = ({ children }) => {
  /* const [token2, setToken] = useState<string | null>(null); */
  const [isLoggedIn, setIsLoggedIn] = useState<boolean>(false);

  const login = (user: {id: string, token: string}) => {
    /* setToken(user.token); */
    localStorage.setItem('token', user.token);
    setIsLoggedIn(true);
    console.log("isLoggedIn after login:", isLoggedIn);
  };

  const logout = () => {
    localStorage.removeItem('token');
    /* setToken(null); */
    setIsLoggedIn(false);
    console.log("isLoggedIn after logout:", isLoggedIn);
    /* console.log("token after logout:",token2); */
  };

  /* useEffect(() => {
    const storedToken = localStorage.getItem('token');
    setIsLoggedIn(Boolean(storedToken)); 
  }, []); */


  return (
    <LoginContext.Provider value={{ /* token2, */ login, logout, isLoggedIn }}>
      {children}
    </LoginContext.Provider>
  );
};

const useLogin = (): LoginContextProps => {
  const context = useContext(LoginContext);
  if (context === undefined) {
    throw new Error('useLogin must be used within a LoginProvider');
  }
  return context;
};

export { LoginProvider, useLogin, LoginContext };