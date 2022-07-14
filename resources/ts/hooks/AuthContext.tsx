import React, { createContext, useContext, useState } from 'react'

type AuthContextProps = {
  isAuth: boolean
  setIsAuth: React.Dispatch<React.SetStateAction<boolean>>
}

const AuthContext = createContext<AuthContextProps>({
  isAuth: false,
  setIsAuth: () => {}
})

export const AuthProvider: React.FC = (props: any) => {
  const [isAuth, setIsAuth] = useState(false)

  return (
    <AuthContext.Provider
      value={{
        isAuth,
        setIsAuth
      }}
    >
      {props.children}
    </AuthContext.Provider>
  )
}

export const useAuth = () => useContext(AuthContext)
