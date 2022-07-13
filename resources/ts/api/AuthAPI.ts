import axios from 'axios'
import { User } from '../types/User'

const getUser = async () => {
  const { data } = await axios.get<User>('api/user')
  return data
}

const signIn = async ({ email, password }: { email: string; password: string }) => {
  const { data } = await axios.post<User>('api/login', { email, password })
  return data
}

const signOut = async () => {
  const { data } = await axios.post<User>('api/logout')
  return data
}

export { getUser, signIn, signOut }
