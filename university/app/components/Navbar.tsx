"use client"

import { useState, useEffect, useRef } from "react"
import Image from "next/image"
import Link from "next/link"
import { Menu, X, ChevronDown, User } from "lucide-react"
import { usePathname } from "next/navigation"

const Navbar = () => {
  const [isScrolled, setIsScrolled] = useState(false)
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false)
  const [isAccountDropdownOpen, setIsAccountDropdownOpen] = useState(false)
  const accountDropdownRef = useRef<HTMLDivElement>(null)
  const pathname = usePathname()

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 0)
    }
    window.addEventListener("scroll", handleScroll)
    return () => window.removeEventListener("scroll", handleScroll)
  }, [])

  useEffect(() => {
    const handleClickOutside = (event: MouseEvent) => {
      if (accountDropdownRef.current && !accountDropdownRef.current.contains(event.target as Node)) {
        setIsAccountDropdownOpen(false)
      }
    }
    document.addEventListener("mousedown", handleClickOutside)
    return () => {
      document.removeEventListener("mousedown", handleClickOutside)
    }
  }, [])

  const navItems = ["Home", "Programmes", "Campuses", "Student Life", "Research", "Contact"]

  const toggleAccountDropdown = () => {
    setIsAccountDropdownOpen(!isAccountDropdownOpen)
  }

  const AccountDropdown = () => (
    <div className="relative" ref={accountDropdownRef}>
      <button
        onClick={toggleAccountDropdown}
        className={`flex items-center text-sm font-medium px-3 py-2 rounded-md transition-colors duration-300 ${
          isScrolled
            ? "text-gray-800 hover:bg-blue-600 hover:text-white"
            : "text-white hover:bg-white hover:text-blue-600"
        }`}
      >
        <User className="w-5 h-5 mr-1" />
        Account
        <ChevronDown
          className={`ml-1 h-4 w-4 transform transition-transform duration-300 ${isAccountDropdownOpen ? "rotate-180" : ""}`}
        />
      </button>
      {isAccountDropdownOpen && (
        <div className="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-10">
          <Link href="/login" className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
            Login
          </Link>
          <Link href="/signup" className="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
            Sign Up
          </Link>
        </div>
      )}
    </div>
  )

  return (
    <nav
      className={`fixed w-full z-50 transition-all duration-300 ${isScrolled ? "bg-white shadow-md" : "bg-transparent"}`}
    >
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex items-center justify-between h-16">
          <div className="flex items-center">
            <Link href="/" className="flex-shrink-0">
              <Image src="/logo.svg" alt="University Logo" width={40} height={40} />
            </Link>
          </div>
          <div className="hidden md:block">
            <div className="ml-10 flex items-baseline space-x-4">
              {navItems.map((item) => {
                const href = item === "Home" ? "/" : `/${item.toLowerCase().replace(/\s+/g, "-")}`
                const isActive = (item === "Home" && pathname === "/") || pathname === href

                return (
                  <Link
                    key={item}
                    href={href}
                    className={`text-sm font-medium px-3 py-2 rounded-md transition-colors duration-300 ${
                      isActive
                        ? "bg-blue-600 text-white"
                        : isScrolled
                          ? "text-gray-800 hover:bg-blue-600 hover:text-white"
                          : "text-white hover:bg-white hover:text-blue-600"
                    }`}
                  >
                    {item}
                  </Link>
                )
              })}
              <AccountDropdown />
            </div>
          </div>
          <div className="md:hidden">
            <button
              onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
              className={`inline-flex items-center justify-center p-2 rounded-md ${
                isScrolled ? "text-gray-800" : "text-white"
              } hover:text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white`}
            >
              <span className="sr-only">Open main menu</span>
              {isMobileMenuOpen ? (
                <X className="block h-6 w-6" aria-hidden="true" />
              ) : (
                <Menu className="block h-6 w-6" aria-hidden="true" />
              )}
            </button>
          </div>
        </div>
      </div>

      {isMobileMenuOpen && (
        <div className="md:hidden">
          <div className="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            {navItems.map((item) => {
              const href = item === "Home" ? "/" : `/${item.toLowerCase().replace(/\s+/g, "-")}`
              const isActive = (item === "Home" && pathname === "/") || pathname === href

              return (
                <Link
                  key={item}
                  href={href}
                  className={`block px-3 py-2 rounded-md text-base font-medium ${
                    isActive ? "bg-blue-600 text-white" : "text-gray-800 hover:bg-blue-600 hover:text-white"
                  }`}
                  onClick={() => setIsMobileMenuOpen(false)}
                >
                  {item}
                </Link>
              )
            })}
            <Link
              href="/login"
              className="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-blue-600 hover:text-white"
              onClick={() => setIsMobileMenuOpen(false)}
            >
              Login
            </Link>
            <Link
              href="/signup"
              className="block px-3 py-2 rounded-md text-base font-medium text-gray-800 hover:bg-blue-600 hover:text-white"
              onClick={() => setIsMobileMenuOpen(false)}
            >
              Sign Up
            </Link>
          </div>
        </div>
      )}
    </nav>
  )
}

export default Navbar

